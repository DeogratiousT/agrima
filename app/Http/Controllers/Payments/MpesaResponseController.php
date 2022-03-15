<?php

namespace App\Http\Controllers\Payments;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Products\Cart;
use App\Models\Products\Order;
use App\Models\Products\Commodity;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Payments\MpesaPayment;
use Illuminate\Support\Facades\Redis;
use AfricasTalking\SDK\AfricasTalking;

class MpesaResponseController extends Controller
{
    public function stkPush(Request $request)
    {
        Log::info('here');
        Log::info($request->all());
        $dotArr = Arr::dot($request->Body);
        
        if ($dotArr['stkCallback.ResultCode'] == 0) { 
            $merchant_id = $dotArr['stkCallback.MerchantRequestID'];
            $user = User::where('mpesa_merchant_id',$merchant_id)->first();

            $cart = $this->getCart($user);         
            $order = $this->createOrder($user, $cart); 
            Log::info($order);        
            $this->savePayload($dotArr, $user, $order);
            $this->clearCart($user);
            $this->cashReceivedSMS($dotArr);

            // $this->updateInvoice($dotArr);
            // ProcessReceiptEmail::dispatch($dotArr);

            Log::info('hurray');

            return redirect()->route('checkout')->with('success','Payments Received');

        }else{
            Log::info('Huu amefail');
        }
    }

    public function urlValidation(Request $request)
    {
        Log::info('URL Validation Endpoint Hit');
        Log::info($request->all());
    }

    public function urlConfirmation(Request $request)
    {
        Log::info('URL Confirmation Endpoint Hit');
        Log::info($request->all());
    }

    public function cashReceivedSMS($dotArr)
    {
        $username = env('AFRICASTALKING_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('AFRICASTALKING_API'); // use your sandbox app API key for development in the test environment

        $AT       = new AfricasTalking($username, $apiKey);
        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => env('AFRICASTALKING_TEST_PHONE'),
            'from' => 'AGRIMA',
            'message' => 'Order completed successfully. Check your Order status at AGRIMA'
        ]);

        Log::info($request);

        return $result;
    }

    public function createOrder($user, $cart)
    {
        return Order::create([
            'user_id' => $user->id,
            'items' => $cart['items'],
            'quantity' => $cart['totalQuantity'],
            'price' => $cart['totalPrice'],
        ]);
    }

    public function savePayload($dotArr, $user, $order)
    {
        return MpesaPayment::create([
            'receipt_number' => $dotArr['stkCallback.CallbackMetadata.Item.1.Value'],
            'date' => $dotArr['stkCallback.CallbackMetadata.Item.3.Value'],
            'amount' => $dotArr['stkCallback.CallbackMetadata.Item.0.Value'],
            'phone' => $dotArr['stkCallback.CallbackMetadata.Item.4.Value'],
            'user_id' => $user->id,
            'order_id' => $order->id,
        ]);
    }

    public function updateInvoice($dotArr)
    {
        $merchant_id = $dotArr['stkCallback.MerchantRequestID'];
        $invoice = Invoice::where('merchant_id',$merchant_id)->first();

        $invoice->paid = true;
        $invoice->save();

        return true;
    }

    public function getCart($user)
    {
        $user_id = $user->id;
        $currentCart = Redis::exists($user_id) ? true : false;

        if ($currentCart) {
            $totalPrice = Redis::hget($user_id, 'totalPrice');
            $totalQuantity = Redis::hget($user_id, 'totalQuantity');
            $items = Redis::hget($user_id, 'items');

            return [
                'totalQuantity' => $totalQuantity,
                'totalPrice' => $totalPrice,
                'items' => $items
            ];
        }
        return false;       
    }

    public function clearCart($user)
    {
        $user_id = $user->id;
        $currentCart = Redis::exists($user_id) ? true : false;

        if ($currentCart) {
            Redis::del($user_id);
            Log::info('deleted cart');
            return true;
        }
        return false;       
    }
}
