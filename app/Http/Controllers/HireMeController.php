<?php

namespace App\Http\Controllers;

use App\Mail\HireMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HireMeController extends Controller
{
    public function sentEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|min:1|max:200',
            'message' => 'required|string|min:1'
        ]);

        Mail::to('danieloktafianus90@gmail.com')
            ->send(new HireMe($validated['email'], $validated['subject'], $validated['message']));

        return redirect()->back();
    }
}
