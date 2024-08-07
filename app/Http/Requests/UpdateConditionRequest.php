<?php

namespace App\Http\Requests;

use App\Models\Condition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConditionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('condition_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
