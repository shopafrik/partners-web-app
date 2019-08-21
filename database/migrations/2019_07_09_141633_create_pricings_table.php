<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->uuid('PRODUCT_id')->primary();
            $table->double('PRICING_actual_price');
            $table->double('PRICING_sale_price')->nullable;
            $table->double('PRICING_sale_percentage')->nullable;
            $table->date('PRICING_sale_start_date')->nullable;
            $table->date('PRICING_sale_end_date')->nullable;

            $table->timestamps();
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
        Schema::dropIfExists('pricings');
    }
}
