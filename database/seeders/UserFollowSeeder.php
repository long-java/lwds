<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserFollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_follow = array(
            array('id' => '3','from' => '2','to' => '3','created_at' => '2021-10-04 22:16:51','updated_at' => '2021-10-04 22:16:51'),
            array('id' => '14','from' => '5','to' => '3','created_at' => NULL,'updated_at' => NULL),
            array('id' => '19','from' => '3','to' => '2','created_at' => NULL,'updated_at' => NULL)
        );
          
        
        DB::table('user_follow') -> insert(
            $user_follow
        );
    }
}
