<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'photos' => [
                'array',
                'required',
            ],
            'photos.*' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'conditions.*' => [
                'integer',
            ],
            'conditions' => [
                'array',
            ],
            'description' => [
                'required',
            ],
            'purchase_price' => [
                'string',
                'required',
            ],
            'sale_price' => [
                'string',
                'required',
            ],
            'source_url' => [
                'string',
                'nullable',
            ],
            'code' => [
                'string',
                'required',
                'unique:products',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
