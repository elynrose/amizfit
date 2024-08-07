<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('condition_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_10005077')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id', 'condition_id_fk_10005077')->references('id')->on('conditions')->onDelete('cascade');
        });
    }
}
