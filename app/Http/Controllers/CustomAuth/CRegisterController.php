<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\AuthInterface;
use App\Http\Requests\Auth\RegisterRequest;

class CRegisterController extends Controller
{
    public function index()
    {
        return view('/custom_auth/register');
    }
    public function register(AuthInterface $auth, RegisterRequest $request)
    {
        $res = $auth->register($request->all());

        if ($res['success']) {
            return redirect('/custom_auth/login')->with('success', $res['message']);
        }

        return redirect()->back()->with('error', $res['message']);
    }
}
