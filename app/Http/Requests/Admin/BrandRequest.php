<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return [
                'name' => ['required', 'string', 'min:3', 'max:20'],
                'description' => ['required', 'min:30', 'max:10000'],
                'logo' => ['required', 'mimes:png,jpg'],
                'status' => ['required', 'numeric','in:0,1'],

            ];
        }
        else
        {
            return [
                'name' => ['required', 'string', 'min:3', 'max:20'],
                'description' => ['required', 'min:30', 'max:10000'],
                'logo' => ['mimes:png,jpg'],
                'status' => ['required', 'numeric','in:0,1'],
            ];
        }
    }
}
