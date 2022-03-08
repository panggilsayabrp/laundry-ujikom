<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'member_name' => ['required', 'max:100'],
            'member_address' => ['required'],
            'gender' => ['required'],
            'member_phone' => ['required', 'max:15']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
