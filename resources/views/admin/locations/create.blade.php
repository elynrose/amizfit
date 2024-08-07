@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.location.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.locations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.location.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip_code">{{ trans('cruds.location.fields.zip_code') }}</label>
                <input class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', '') }}">
                @if($errors->has('zip_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.zip_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_usps_city_name">{{ trans('cruds.location.fields.official_usps_city_name') }}</label>
                <input class="form-control {{ $errors->has('official_usps_city_name') ? 'is-invalid' : '' }}" type="text" name="official_usps_city_name" id="official_usps_city_name" value="{{ old('official_usps_city_name', '') }}">
                @if($errors->has('official_usps_city_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_usps_city_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.official_usps_city_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_usps_state_code">{{ trans('cruds.location.fields.official_usps_state_code') }}</label>
                <input class="form-control {{ $errors->has('official_usps_state_code') ? 'is-invalid' : '' }}" type="text" name="official_usps_state_code" id="official_usps_state_code" value="{{ old('official_usps_state_code', '') }}">
                @if($errors->has('official_usps_state_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_usps_state_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.official_usps_state_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_state_name">{{ trans('cruds.location.fields.official_state_name') }}</label>
                <input class="form-control {{ $errors->has('official_state_name') ? 'is-invalid' : '' }}" type="text" name="official_state_name" id="official_state_name" value="{{ old('official_state_name', '') }}">
                @if($errors->has('official_state_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_state_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.official_state_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="primary_official_county_code">{{ trans('cruds.location.fields.primary_official_county_code') }}</label>
                <input class="form-control {{ $errors->has('primary_official_county_code') ? 'is-invalid' : '' }}" type="text" name="primary_official_county_code" id="primary_official_county_code" value="{{ old('primary_official_county_code', '') }}">
                @if($errors->has('primary_official_county_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('primary_official_county_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.primary_official_county_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="primary_official_county_name">{{ trans('cruds.location.fields.primary_official_county_name') }}</label>
                <input class="form-control {{ $errors->has('primary_official_county_name') ? 'is-invalid' : '' }}" type="text" name="primary_official_county_name" id="primary_official_county_name" value="{{ old('primary_official_county_name', '') }}">
                @if($errors->has('primary_official_county_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('primary_official_county_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.primary_official_county_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="official_county_code">{{ trans('cruds.location.fields.official_county_code') }}</label>
                <input class="form-control {{ $errors->has('official_county_code') ? 'is-invalid' : '' }}" type="text" name="official_county_code" id="official_county_code" value="{{ old('official_county_code', '') }}">
                @if($errors->has('official_county_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_county_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.official_county_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="timezone">{{ trans('cruds.location.fields.timezone') }}</label>
                <input class="form-control {{ $errors->has('timezone') ? 'is-invalid' : '' }}" type="text" name="timezone" id="timezone" value="{{ old('timezone', '') }}">
                @if($errors->has('timezone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('timezone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.timezone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="geo_point">{{ trans('cruds.location.fields.geo_point') }}</label>
                <input class="form-control {{ $errors->has('geo_point') ? 'is-invalid' : '' }}" type="text" name="geo_point" id="geo_point" value="{{ old('geo_point', '') }}">
                @if($errors->has('geo_point'))
                    <div class="invalid-feedback">
                        {{ $errors->first('geo_point') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.geo_point_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection