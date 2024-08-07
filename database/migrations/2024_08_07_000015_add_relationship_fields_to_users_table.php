<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('zip_code_id')->nullable();
            $table->foreign('zip_code_id', 'zip_code_fk_10005081')->references('id')->on('locations');
        });
    }
}
