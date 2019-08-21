<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->uuid('ASSET_id')->primary();
            $table->uuid('PRODUCT_id');
            $table->string('ASSET_color')->nullable();
            $table->string('ASSET_url');
            $table->string('ASSET_pic_or_video');
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
        Schema::dropIfExists('assets');
    }
}
