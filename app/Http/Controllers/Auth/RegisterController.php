<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use DB;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number
            ];

            User::create($data);
            DB::commit();
            return redirect("/auth/login")->with('success', 'User created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
