<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'outlet_id' => ['required', 'numeric'],
            'package_id' => ['required', 'numeric'],
            'member_id' => ['required', 'numeric'],
            'invoice_kode' => ['required'],
            'date' => ['required'],
            'payment_deadline' => ['required'],
            'payment_date' => ['required'],
            'additional_cost' => ['required'],
            'discount' => ['required'],
            'tax' => ['required'],
            'order_status' => ['required'],
            'payment_status' => ['required'],
            'qty' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
