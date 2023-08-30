<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'mobile'   => ['required', 'exists:users,mobile', 'numeric', 'regex:/^09\d{9}$/'],
            'password' => ['required'],
            'g-recaptcha-response' => ['required', 'recaptcha'],
        ];
    }
}
