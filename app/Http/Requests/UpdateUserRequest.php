<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'street' => [
                'string',
                'nullable',
            ],
            'state' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'zip_code_id' => [
                'required',
                'integer',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }
}
