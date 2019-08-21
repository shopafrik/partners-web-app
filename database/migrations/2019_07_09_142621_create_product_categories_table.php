<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->uuid('PC_id')->primary();
            $table->uuid('PRODUCT_id');
            $table->integer('SC_id')->unsigned();
            $table->timestamps();
            $table->foreign('SC_id')->references('SC_id')->on('sub_categories');
            $table->foreign('PRODUCT_id')->references('PRODUCT_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}
