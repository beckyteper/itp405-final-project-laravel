<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Validator;
use Auth;

class SignupController extends Controller
{
    public function index() {
        return view('signup');
    }

    public function signup(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validation->passes()) {
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->save();

            Auth::attempt([
                'email' => request('email'),
                'password' => request('password')
            ]);

            return redirect('/');
        } else {
            return redirect('/signup')
                ->withInput()
                ->withErrors($validation);
        }
    }
}
