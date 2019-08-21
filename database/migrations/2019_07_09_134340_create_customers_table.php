<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('USER_id')->primary();
            $table->string('CUSTOMER_surname')->nullable();
            $table->string('CUSTOMER_username')->nullable();
            $table->date('CUSTOMER_dob')->nullable;
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
        Schema::dropIfExists('customers');
    }
}
