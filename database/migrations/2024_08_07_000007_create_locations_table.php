<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('zip_code')->nullable();
            $table->string('official_usps_city_name')->nullable();
            $table->string('official_usps_state_code')->nullable();
            $table->string('official_state_name')->nullable();
            $table->string('primary_official_county_code')->nullable();
            $table->string('primary_official_county_name')->nullable();
            $table->string('official_county_code')->nullable();
            $table->string('timezone')->nullable();
            $table->string('geo_point')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
