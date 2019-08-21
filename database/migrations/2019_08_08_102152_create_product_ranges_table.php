<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_ranges', function (Blueprint $table) {
            $table->uuid('PR_id');
            $table->uuid('PRODUCT_id');
            $table->integer('RANGES_id')->unsigned();
            $table->timestamps();
            $table->foreign('PRODUCT_id')->references('PRODUCT_id')->on('products');
            $table->foreign('RANGES_id')->references('RANGES_id')->on('ranges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_ranges');
    }
}
