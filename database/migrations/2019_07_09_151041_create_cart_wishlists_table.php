<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_wishlists', function (Blueprint $table) {
            $table->uuid('CW_id')->primary();
            $table->uuid('USER_id');
            $table->uuid('PRODUCT_id');
            $table->uuid('CW_cart_or_wish');
            $table->uuid('CW_quantity')->nullable();
            $table->uuid('CW_price')->nullable();
            $table->timestamps();
            $table->foreign('USER_id')->references('USER_id')->on('users');
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
        Schema::dropIfExists('cart_wishlists');
    }
}
