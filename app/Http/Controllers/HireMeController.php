<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptcha;
use App\Mail\HireMe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HireMeController extends Controller
{
    public function sentEmail(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required|string|min:1|max:200',
            'message' => 'required|string|min:1',
            'g-recaptcha-response' => [new ReCaptcha]
        ]);

        if ($validated->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->with('sentEmailFail', 'Failed to sent email.');
        }

        try {
            Mail::to('danieloktafianus36@gmail.com')
                ->send(
                    new HireMe(
                        $request->email,
                        $request->subject,
                        $request->message
                    )
                );

            return redirect()
                ->back()
                ->withInput()
                ->with('sentEmailSucess', 'Successfully sent email.');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('sentEmailFail', 'Failed to sent email.');
        }
    }
}
