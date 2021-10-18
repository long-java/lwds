<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = array(
            array('id' => '1','role_id' => '1','user_id' => '1'),
            array('id' => '2','role_id' => '3','user_id' => '2'),
            array('id' => '3','role_id' => '3','user_id' => '3'),
            array('id' => '4','role_id' => '3','user_id' => '4'),
            array('id' => '5','role_id' => '3','user_id' => '5'),
            array('id' => '6','role_id' => '3','user_id' => '9'),
            array('id' => '7','role_id' => '3','user_id' => '17'),
            array('id' => '8','role_id' => '3','user_id' => '18'),
            array('id' => '9','role_id' => '3','user_id' => '19'),
        );
          
        
        DB::table('user_role') -> insert(
            $user_role
        );


    }
}
