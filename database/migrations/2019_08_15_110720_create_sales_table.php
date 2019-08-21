<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('SALES_id');
            $table->uuid('BRAND_id');
            $table->double('SALES_percentage');
            $table->json('SALES_product_ids');
            $table->json('SALES_sub_categs');
            $table->timestamps();

            $table->foreign('BRAND_id')->references('USER_id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
