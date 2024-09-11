<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        return view('resource');
    }

    public function display()
    {
        $data = [
            [
                "name" => "Laravel::Auth",
                "routes" => [
                    "desc" => ["Login", "regiter", "dashborad"],
                    "url" => ["/auth/login", "/auth/register", "/dashboard"],
                ],
            ],
            [
                "name" => "Custom::Auth",
                "routes" => [
                    "desc" => ["Login", "regiter", "dashborad"],
                    "url" => ["/custom_auth/login", "/custom_auth/register", "/custom_dashboard"]
                ],
            ]
        ];

        return view("resource", compact("data"));
    }
}
