<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOccasionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_occasions', function (Blueprint $table) {
            $table->uuid('PO_id');
            $table->uuid('PRODUCT_id');
            $table->integer('OCCASION_id')->unsigned();
            $table->timestamps();
            $table->foreign('PRODUCT_id')->references('PRODUCT_id')->on('products');
            $table->foreign('OCCASION_id')->references('OCCASION_id')->on('occasions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_occasions');
    }
}
