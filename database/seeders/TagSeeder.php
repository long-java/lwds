<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = array(
            array('id' => '1','text' => 'Laravel','description' => 'Framework Laravel','image' => 'https://itzone.com.vn/wp-content/uploads/2020/01/Laravel-1.png','user_creative_id' => '1','created_at' => '2021-09-30 19:52:19','updated_at' => '2021-09-30 19:52:19'),
            array('id' => '2','text' => 'Vuejs','description' => 'Framework Vuejs. Vue is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable.','image' => 'https://itguru.vn/blog/wp-content/uploads/2020/06/Vuejs-logo-itguruvn.jpg','user_creative_id' => '1','created_at' => '2021-09-30 19:52:13','updated_at' => '2021-09-30 19:52:13'),
            array('id' => '3','text' => 'LOL','description' => 'Game Lol','image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/LoL_icon.svg/2048px-LoL_icon.svg.png','user_creative_id' => '1','created_at' => '2021-09-30 19:52:03','updated_at' => '2021-09-30 19:52:03'),
            array('id' => '4','text' => 'Fun','description' => 'Fun is being enjoyed by friends and family with sharing silly things and silly jokes.. by commenting each other..the fun is greatest pleasure which have tendency to active the mind and keep enjoy with laughing face..in everyone being..','image' => 'https://image.flaticon.com/icons/png/512/126/126422.png','user_creative_id' => '3','created_at' => '2021-09-22 12:56:40','updated_at' => '2021-09-22 12:56:40'),
            array('id' => '11','text' => 'Huong','description' => 'Huong is my friend','image' => 'https://image.flaticon.com/icons/png/512/126/126422.png','user_creative_id' => '2','created_at' => '2021-09-23 07:51:14','updated_at' => '2021-09-23 07:51:14'),
            array('id' => '13','text' => 'BeautyfulGirl','description' => NULL,'image' => 'https://img.vccidata.com.vn/wp-content/uploads/2021/06/hinh-gai-xinh-mat-dep-23.jpg','user_creative_id' => '1','created_at' => '2021-10-08 08:09:30','updated_at' => '2021-10-08 08:09:30')
          );
          
        DB::table('tags')->insert(
            $tags
        );
    }
}
