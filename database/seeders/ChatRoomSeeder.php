<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chat_rooms = array(
            array('id' => '2','name' => 'Generalll','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Laravel','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Vuejs','created_at' => NULL,'updated_at' => NULL)
        );

        DB::table('chat_rooms') -> insert(
            $chat_rooms
        );

        
    }
}
