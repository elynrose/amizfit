<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_create');
    }

    public function rules()
    {
        return [
            'stripe_transaction' => [
                'string',
                'required',
            ],
            'amount' => [
                'required',
            ],
            'package' => [
                'string',
                'required',
            ],
        ];
    }
}
