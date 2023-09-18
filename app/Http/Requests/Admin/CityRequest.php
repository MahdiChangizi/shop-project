<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => ['required', 'min:5', 'max:20'],
                'parent_id' => ['required', 'numeric', 'exists:provinces_and_cities,id'],
                'status' => ['required', 'in:0,1', 'numeric']
            ];
        } else {
            return [
                'name' => ['required', 'min:5', 'max:20'],
            'status' => ['required', 'in:0,1', 'numeric']
            ];
        }
    }
}
