<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_post = array(
            array('id' => '81','tag_id' => '3','post_id' => '7','created_at' => NULL,'updated_at' => NULL),
            array('id' => '93','tag_id' => '1','post_id' => '11','created_at' => NULL,'updated_at' => NULL),
            array('id' => '94','tag_id' => '4','post_id' => '11','created_at' => NULL,'updated_at' => NULL),
            array('id' => '95','tag_id' => '11','post_id' => '11','created_at' => NULL,'updated_at' => NULL),
            array('id' => '96','tag_id' => '4','post_id' => '16','created_at' => NULL,'updated_at' => NULL),
            array('id' => '97','tag_id' => '2','post_id' => '17','created_at' => NULL,'updated_at' => NULL),
            array('id' => '101','tag_id' => '4','post_id' => '15','created_at' => NULL,'updated_at' => NULL),
            array('id' => '102','tag_id' => '13','post_id' => '18','created_at' => NULL,'updated_at' => NULL),
            array('id' => '103','tag_id' => '3','post_id' => '14','created_at' => NULL,'updated_at' => NULL),
            array('id' => '104','tag_id' => '4','post_id' => '14','created_at' => NULL,'updated_at' => NULL),
            array('id' => '105','tag_id' => '2','post_id' => '14','created_at' => NULL,'updated_at' => NULL),
            array('id' => '106','tag_id' => '3','post_id' => '13','created_at' => NULL,'updated_at' => NULL)
          );


        DB::table('tag_post') -> insert(
            $tag_post
        );
    }
}
