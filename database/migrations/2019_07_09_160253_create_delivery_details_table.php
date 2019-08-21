<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->uuid('ORDER_id')->primary();
            $table->string('DD_names');
            $table->string('DD_phone_one');
            $table->string('DD_phone_two')->nullable();
            $table->string('DD_email');
            $table->string('DD_address_one');
            $table->string('DD_address_two')->nullable();
            $table->string('DD_address_three')->nullable();
            $table->string('DD_city');
            $table->string('DD_state_province')->nullable();
            $table->string('DD_state_country');
            $table->timestamps();
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
        Schema::dropIfExists('delivery_details');
    }
}
