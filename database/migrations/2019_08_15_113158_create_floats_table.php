<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFloatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floats', function (Blueprint $table) {
            $table->increments('FLOAT_id');
            $table->string('FLOAT_title');
            $table->string('FLOAT_pic_link');
            $table->string('FLOAT_table_name');
            $table->string('FLOAT_table_id');
            $table->integer('PC_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('PC_id')->references('PC_id')->on('parent_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floats');
    }
}
