<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required| max:255|string",
            "email" => "required|email|unique:users,email",
            "username" => "required|unique:users,username|min:3",
            "password" => "required|confirmed",
            "password_confirmation" => "required | same:password",
            "phone_number" => "required|numeric|digits:10",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "username.required" => "Username is required",
            "password.required" => "Password is required",
            "phone_number.required" => "Phone number is required",
            "password_confirmation.required" => "Password confirmation is required",
            "password_confirmation.same" => "Password confirmation must be same with password",
            "phone_number.digits" => "Phone number must be 10 digits",
            "phone_number.numeric" => "Phone number must be numeric",
            "email.unique" => "Email already exists",
            "username.unique" => "Username already exists",
            "email.email" => "Email must be valid",
            "username.min" => "Username must be at least 3 characters",
        ];
    }
}
