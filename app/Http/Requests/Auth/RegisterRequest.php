<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'userName' => ['required', 'unique:users,userName'],
            'mobile'   => ['required', 'unique:users,mobile', 'numeric', 'regex:/^09\d{9}$/'],
            'password' => ['required', Password::min(8)->numbers()->mixedCase()],
            'g-recaptcha-response' => ['required', 'recaptcha'],
        ];
    }
}
