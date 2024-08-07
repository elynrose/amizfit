@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.location.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.locations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $location->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $location->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.zip_code') }}
                                    </th>
                                    <td>
                                        {{ $location->zip_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.official_usps_city_name') }}
                                    </th>
                                    <td>
                                        {{ $location->official_usps_city_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.official_usps_state_code') }}
                                    </th>
                                    <td>
                                        {{ $location->official_usps_state_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.official_state_name') }}
                                    </th>
                                    <td>
                                        {{ $location->official_state_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.primary_official_county_code') }}
                                    </th>
                                    <td>
                                        {{ $location->primary_official_county_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.primary_official_county_name') }}
                                    </th>
                                    <td>
                                        {{ $location->primary_official_county_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.official_county_code') }}
                                    </th>
                                    <td>
                                        {{ $location->official_county_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.timezone') }}
                                    </th>
                                    <td>
                                        {{ $location->timezone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.location.fields.geo_point') }}
                                    </th>
                                    <td>
                                        {{ $location->geo_point }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.locations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection