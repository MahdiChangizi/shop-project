<?php

namespace App\Http\Requests\Coustomer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'userName'   => ['required', Rule::unique('users', 'userName')->ignore(auth()->id())],
            'first_name' => ['required', 'min:3', 'max:20'],
            'last_name'  => ['required', 'min:3', 'max:30']
        ];
    }
}
