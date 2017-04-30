<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login() {
        $loginWasSuccessful = Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if ($loginWasSuccessful) {
            return redirect('/');
        } else {
            return redirect('/login')
                ->withInput()
                ->withErrors('Log in failed. Please re-enter your email and password.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
