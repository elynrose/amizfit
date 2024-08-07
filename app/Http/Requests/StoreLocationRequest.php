<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('location_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'zip_code' => [
                'string',
                'nullable',
            ],
            'official_usps_city_name' => [
                'string',
                'nullable',
            ],
            'official_usps_state_code' => [
                'string',
                'nullable',
            ],
            'official_state_name' => [
                'string',
                'nullable',
            ],
            'primary_official_county_code' => [
                'string',
                'nullable',
            ],
            'primary_official_county_name' => [
                'string',
                'nullable',
            ],
            'official_county_code' => [
                'string',
                'nullable',
            ],
            'timezone' => [
                'string',
                'nullable',
            ],
            'geo_point' => [
                'string',
                'nullable',
            ],
        ];
    }
}
