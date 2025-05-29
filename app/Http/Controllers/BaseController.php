<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function baseClientPage()
    {
        return view('client.base');
    }

    public function mainContentPage()
    {
        return view('client.mainPage');
    }
}
