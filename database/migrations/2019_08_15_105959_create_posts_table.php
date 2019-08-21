<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('POST_id');
            $table->string('POST_title');
            $table->string('POST_sub_title');
            $table->json('POST_description');
            $table->string('POST_main_pic_link');
            $table->json('POST_pic_links');
            $table->json('POST_product_ids');
            $table->string('POST_author')->nullable();
            $table->json('POST_tags')->nullable();
            $table->char('POST_type')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
