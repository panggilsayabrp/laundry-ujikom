<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'package_name' => ['required'],
            'type' => ['required'],
            'package_price' => ['required', 'numeric', 'min:0', 'not_in:0'],
            'outlet_id' => ['required']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
