<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table -> increments('id');
            $table -> integer('user_id');
            $table -> string('title');
            $table -> string('content', 8000);
            $table -> string('content_html', 12000);
            $table -> string('tag_id');
            $table -> integer('number_view')->default(0);
            $table -> integer('number_vote')->default(0);
            $table -> string('user_voted', 500)->nullable();
            $table -> string('user_down', 500)->nullable();
            $table -> string('bookmark')->nullable() ->default(0);


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
