<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->uuid('PA_id')->primary();
            $table->uuid('PRODUCT_id');
            $table->bigInteger('ATTRIBUTE_id')->unsigned();
            $table->timestamps();
            $table->foreign('PRODUCT_id')->references('PRODUCT_id')->on('products');
            $table->foreign('ATTRIBUTE_id')->references('ATTRIBUTE_id')->on('attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
