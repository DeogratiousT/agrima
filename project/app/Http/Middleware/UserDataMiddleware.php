<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Products\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $cart = new Cart;

            // Share user data to header
            View::composer('includes.header', function ($view) use ($cart) {
                return $view->with('totalCartQuantity', $cart->totalQuantity);
            });
        }
        
        return $next($request);
    }
}
