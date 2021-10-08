<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table -> increments('id');
            $table -> integer('user_id');
            $table -> string('avatar', 500) -> nullable() -> default('https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png');
            $table -> string('contact', 500) -> nullable();
            $table -> string('follow') -> nullable();
            $table -> string('follower',500) -> nullable();
            $table -> string('tag_care') -> nullable();


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
        Schema::dropIfExists('user_details');
    }
}
