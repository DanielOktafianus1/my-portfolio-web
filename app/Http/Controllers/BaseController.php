<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function baseClientPage()
    {

        return view('client.base');
    }

    public function mainContentPage()
    {
        $user = User::first();
        return view('client.mainPage', compact('user'));
    }
}
