<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BaseAdminController extends Controller
{
    public function loginPage()
    {

        if (User::count() === 0) {
            return view('admin.register');
        } else {
            return view('admin.login');
        }
    }

    public function actionRegister(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Name must be filled in!',
            'email.required' => 'Email must be filled in!',
            'email.email' => 'Invalid email!',
            'password.required' => 'Password must be filled in!',
            'password.min' => 'Password must be at least 8 characters!',
            'password.confirmed' => 'Password confimation does not match!',
        ]);

        if ($validated->fails()) {
            return redirect()
                ->back()
                ->with('registerValidateError', 'Failed to register, please check your form again!')
                ->withErrors($validated)
                ->withInput();
        }

        $createUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($createUser) {
            return redirect()
                ->route('login')
                ->with('registerSuccess', 'Your account has been created, please login.');
        }

        return redirect()
            ->back()
            ->with('registerFailed', 'Failed to register, please check your form again!')
            ->withErrors($validated)
            ->withInput();
    }

    public function actionLogin(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $cridentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (Auth::attempt($cridentials)) {

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))->with('loginSuccess', 'Wellcome back again Mr.' . Auth::user()->name);
        }

        return redirect()->back()->with('loginFailed', 'Failed to login, please check your email address or password again.')->withInput();
    }

    public function basePage()
    {
        return view('admin.baseAdmin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
