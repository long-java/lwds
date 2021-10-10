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
            array('id' => '102','tag_id' => '13','post_id' => '18','created_at' => NULL,'updated_at' => NULL),
            array('id' => '103','tag_id' => '3','post_id' => '14','created_at' => NULL,'updated_at' => NULL),
            array('id' => '104','tag_id' => '4','post_id' => '14','created_at' => NULL,'updated_at' => NULL),
            array('id' => '105','tag_id' => '2','post_id' => '14','created_at' => NULL,'updated_at' => NULL),
            array('id' => '109','tag_id' => '13','post_id' => '19','created_at' => NULL,'updated_at' => NULL),
            array('id' => '110','tag_id' => '4','post_id' => '19','created_at' => NULL,'updated_at' => NULL),
            array('id' => '112','tag_id' => '1','post_id' => '16','created_at' => NULL,'updated_at' => NULL),
            array('id' => '119','tag_id' => '2','post_id' => '13','created_at' => NULL,'updated_at' => NULL),
            array('id' => '122','tag_id' => '1','post_id' => '11','created_at' => NULL,'updated_at' => NULL),
            array('id' => '123','tag_id' => '3','post_id' => '7','created_at' => NULL,'updated_at' => NULL),
            array('id' => '124','tag_id' => '2','post_id' => '7','created_at' => NULL,'updated_at' => NULL)
        );
          


        DB::table('tag_post') -> insert(
            $tag_post
        );
    }
}
