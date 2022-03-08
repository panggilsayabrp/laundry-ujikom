<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'username' => ['required', 'unique:users', 'alpha_dash'],
            'role' => ['required'],
            'outlet_id' => ['required'],
            'password' => [
                'required',
                Password::min(8)
                    ->numbers()
                    ->letters()
                    ->mixedCase()
            ]
        ];
    }
}
