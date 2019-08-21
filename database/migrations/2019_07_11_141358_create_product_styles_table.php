<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_styles', function (Blueprint $table) {
            $table->uuid('PS_id');
            $table->uuid('PRODUCT_id');
            $table->integer('STYLE_id')->unsigned();
            $table->timestamps();
            $table->foreign('PRODUCT_id')->references('PRODUCT_id')->on('products');
            $table->foreign('STYLE_id')->references('STYLE_id')->on('styles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_styles');
    }
}
