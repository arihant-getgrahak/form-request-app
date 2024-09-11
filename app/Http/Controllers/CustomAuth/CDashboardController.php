<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Service\AuthInterface;

class CDashboardController extends Controller
{
    public function index()
    {
        return view('/custom_auth/dashboard');
    }
    public function logout(AuthInterface $auth)
    {
        $auth->logout();
        return redirect('/custom_auth/login');
    }
}
