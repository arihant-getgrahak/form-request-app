<?php
namespace App\Service;
use App\Service\AuthInterface;
use DB;
use Hash;
use App\Models\User;
use Auth;

class CustomAuth implements AuthInterface
{
    public function login(array $data): array
    {
        $formData = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        if (Auth::attempt($formData)) {
            return [
                'success' => true,
                'message' => 'User login successfully'
            ];
        }
        return [
            'success' => false,
            'message' => 'Email or Password not valid'
        ];
    }

    public function register(array $data): array
    {
        DB::beginTransaction();
        try {
            $formData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phone_number']
            ];

            User::create($formData);
            DB::commit();
            return [
                'success' => true,
                'message' => 'User created successfully'
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function logout(): void
    {
    }
}
