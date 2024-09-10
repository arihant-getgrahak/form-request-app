<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\AuthInterface;

class CLoginController extends Controller
{
    public function index()
    {
        return view('/custom_auth/login');
    }

    public function login(AuthInterface $auth, Request $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $res = $auth->login($data);
        if ($res['success']) {
            return redirect("/custom_auth/dashboard")->with('success', $res['message']);
        }
        return redirect()->back()->with('error', $res['message']);
    }
}
