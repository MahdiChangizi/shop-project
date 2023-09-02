<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActivationRequest extends FormRequest
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
            'mobile' => ['required', Rule::unique('users', 'mobile')->ignore(auth()->id()), 'numeric', 'regex:/^09\d{9}$/'],
            'code'   => ['required', 'integer', 'min:100000' ,'max:999999']
        ];
    }
}
