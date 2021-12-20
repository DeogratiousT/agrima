<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeOtherController extends Controller
{
    public function tcs()
    {
        return view('landing.other.tcs');
    }

    public function faqs()
    {
        return view('landing.other.faqs');
    }

    public function ppolicy()
    {
        return view('landing.other.ppolicy');
    }

    public function help()
    {
        return view('landing.other.help');
    }
}
