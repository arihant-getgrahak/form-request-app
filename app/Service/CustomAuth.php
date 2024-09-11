<?php
namespace App\Service;
use App\Service\AuthInterface;
use DB;
use Hash;
use App\Models\User;
use Auth;
// use Session;
use Illuminate\Contracts\Session\Session;

class CustomAuth implements AuthInterface
{
    protected $session;
    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    public function login(array $data)
    {
        $checkUserExist = User::where('email', $data['email'])->first();
        if (!$checkUserExist) {
            return [
                'success' => false,
                'message' => 'Email or Password not valid'
            ];
        }
        if (!Hash::check($data['password'], $checkUserExist->password)) {
            return [
                'success' => false,
                'message' => 'Incorrect Password'
            ];
        }
        $this->session->put("user", $checkUserExist);
        $this->session->migrate(true);
        $this->user = $checkUserExist;
        return [
            'success' => true,
            'message' => $checkUserExist->password

        ];
        // if (Hash::check($data['password'], Auth::user()->password)) {
        //     return [
        //         'success' => true,
        //         'message' => 'User Login Successfully..'
        //     ];
        // }

        // return [
        //     'success' => false,
        //     'message' => 'Email or Password not valid'
        // ];
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
        $this->session->remove("user");
    }
}
