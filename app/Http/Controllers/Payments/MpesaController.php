<?php

namespace App\Http\Controllers\Payments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MpesaController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAccessToken()
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $consumerKey = trim(env('MPESA_CONSUMER_KEY'));
        $consumerSecret = trim(env('MPESA_CONSUMER_SECRET'));
        $base64MpesaCredentials =  base64_encode($consumerKey.':'.$consumerSecret);

        $curl = curl_init($url);
        curl_setopt_array(
            $curl, 
            array(
                CURLOPT_HTTPHEADER => ['Authorization: Basic '.$base64MpesaCredentials],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false
            )
        );

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response)->access_token;
    }

    public function makeHttp($url, $body)
    {
        $curl = curl_init();
        $curl_post_data = json_encode($body);
        curl_setopt_array(
            $curl, 
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => [
                    'Content-Type:application/json',
                    'Authorization:Bearer '. $this->getAccessToken()
                ],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $curl_post_data,
                CURLOPT_SSL_VERIFYPEER => false
        ));

        $curl_response = curl_exec($curl);

        curl_close($curl);

        return $curl_response;
    }

    public function stkPush(Request $request)
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
        : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
        $timestamp = date('YmdHis');
        $password = env('MPESA_STK_SHORTCODE').trim(env('MPESA_PASSKEY')).$timestamp;

        $curl_post_data = [
            "BusinessShortCode" => (int) env('MPESA_STK_SHORTCODE'),
            "Password" =>  base64_encode($password),
            "Timestamp" => $timestamp,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => 1,
            "PartyA" => (int) $request->phone,
            "PartyB" => (int) env('MPESA_STK_SHORTCODE'),
            "PhoneNumber" => (int) $request->phone,
            "CallBackURL" => trim(env('MPESA_TEST_URL')). '/api/callback/stkpush',
            "AccountReference" => env('MPESA_TEST_ACCOUNT'),
            "TransactionDesc" => env('MPESA_TEST_ACCOUNT') 
        ];

        $response =  $this->makeHttp($url, $curl_post_data);

        $merchant_id = json_decode($response)->MerchantRequestID;

        $this->saveMerchantId($merchant_id);

        // ProcessInvoice::dispatch(json_decode($request->items), $request->user(), $merchant_id);

        return $response;
    }

    public function registerUrls()
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
        : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';

        $body = array(
            "ShortCode" => (int) env('MPESA_SHORTCODE'),
            "ResponseType" =>  'Completed',
            "ConfirmationURL" => trim(env('MPESA_TEST_URL')). '/api/confirmation',
            "ValidationURL" => trim(env('MPESA_TEST_URL')). '/api/validation'
        );

        $response =  $this->makeHttp($url, $body);

        return $response;
    }

    public function simulateTransaction(Request $request)
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
        : 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';

        $body = array(
            "Command ID" => "CustomerPayBillOnline",
            "Amount" => $request->amount,
            "Msisdn" => (int) env('MPESA_TEST_MSISDN'),
            "BillRefNumber" => $request->account,
            "ShortCode" => (int) env('MPESA_SHORTCODE')
        );

        $response =  $this->makeHttp($url, $body);

        return $response;
    }

    public function saveMerchantId($mid)
    {
        $user = Auth::user();
        $user->mpesa_merchant_id = $mid;
        $user->save();

        return true;
    }
}
