<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->uuid('OP_id')->primary();
            $table->uuid('ORDER_id');
            $table->uuid('PRODUCT_id');
            $table->uuid('QUANTITY_id');
            $table->double('OP_quantity');
            $table->double('OP_product_price');
            $table->timestamps();
            $table->foreign('ORDER_id')->references('ORDER_id')->on('orders');
            $table->foreign('PRODUCT_id')->references('PRODUCT_id')->on('products');
            $table->foreign('QUANTITY_id')->references('QUANTITY_id')->on('quantities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
