<?php

namespace App\Http\Controllers;

use Hash;
use DB;
use App\Models\User;
use App\Http\Requests\FormPostRequest;

class FormController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(FormPostRequest $request)
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
            return redirect()->back()->with('success', 'User created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
