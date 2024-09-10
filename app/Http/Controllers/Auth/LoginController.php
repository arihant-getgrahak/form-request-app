<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view("/auth/login");
    }

    public function login(LoginRequest $request)
    {
        // dd($request->all());
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            return redirect("/dashboard")->with('success', 'User Login Successfully..');
        }
        return redirect()->back()->with('error', 'Email or Password not valid');
    }
}
