<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('text', 150);
            $table -> string('description') -> nullable();
            $table -> string('image') -> nullable()-> default('https://image.flaticon.com/icons/png/512/126/126422.png');
            $table -> integer('user_creative_id') -> nullable()-> default(1);

            
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
        Schema::dropIfExists('tags');
    }
}
