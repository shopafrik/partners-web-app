<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('USER_id')->primary();
            $table->string('USER_name')->nullable();
            $table->string('USER_email')->unique();
            $table->timestamp('USER_email_verified_at')->nullable();
            $table->string('USER_phone')->nullable();
            $table->string('USER_profile_link')->nullable();
            $table->char('USER_role');
            $table->string('USER_password');
            $table->boolean('USER_isFirstLog');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
