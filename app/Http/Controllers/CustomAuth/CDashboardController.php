<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;

class CDashboardController extends Controller
{
    public function index(){
        return view('/custom_auth/dashboard');
    }
}
