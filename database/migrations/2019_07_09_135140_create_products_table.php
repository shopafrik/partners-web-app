<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('PRODUCT_id')->primary();
            $table->string('PRODUCT_name');
            $table->mediumText('PRODUCT_short_description');
            $table->longText('PRODUCT_long_description')->nullable();
            $table->longText('PRODUCT_status');
            $table->uuid('PRODUCT_creator');
            $table->uuid('BRAND_id');
            $table->timestamps();

            $table->foreign('PRODUCT_creator')->references('USER_id')->on('users');
            $table->foreign('BRAND_id')->references('USER_id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
