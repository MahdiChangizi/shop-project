<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerStoreRequest extends FormRequest
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
            'url'       => ['required', 'min:5', 'max:255'],
            'status'    => ['required', 'in:0,1', 'numeric'],
            'position' =>  ['required', Rule::in(['top-right', 'top-left', 'between-items', 'bottom-items'])],
            'image'     => ['required', 'mimes:png,jpg,jpeg'],
        ];
    }
}
