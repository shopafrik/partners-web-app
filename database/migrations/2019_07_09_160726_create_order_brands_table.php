<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_brands', function (Blueprint $table) {
            $table->bigIncrements('OB_id');
            $table->uuid('BRAND_id');
            $table->uuid('ORDER_id');
            $table->timestamps();
            $table->foreign('BRAND_id')->references('USER_id')->on('brands');
            $table->foreign('ORDER_id')->references('ORDER_id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_brands');
    }
}
