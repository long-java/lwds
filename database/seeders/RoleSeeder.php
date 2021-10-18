<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $roles = array(
            array('id' => '1','name' => 'Administrator','description' => ''),
            array('id' => '2','name' => 'Moderators','description' => ''),
            array('id' => '3','name' => 'Guest','description' => '')
        );
          
        
        DB::table('roles') -> insert(
            $roles
        );

    }
}
