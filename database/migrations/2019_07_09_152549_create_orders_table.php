<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('ORDER_id')->primary();
            $table->uuid('USER_id');
            $table->string('ORDER_status');
            $table->double('ORDER_total_price');
            $table->string('ORDER_currency');
            $table->timestamps();
            $table->foreign('USER_id')->references('USER_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
