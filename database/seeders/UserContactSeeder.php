<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_contacts = array(
            array('id' => '1','user_id' => '3','writer_id' => '1','content' => 'Ẩn danh quái gi, tên gi ?','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','user_id' => '3','writer_id' => '2','content' => 'Tên bro là gi ?','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','user_id' => '2','writer_id' => '1','content' => 'Xinh quá em ơi','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','user_id' => '1','writer_id' => '2','content' => 'Hóa ra là Long Decepticon !!','created_at' => '2021-09-25 09:44:18','updated_at' => '2021-09-25 09:44:18'),
            array('id' => '10','user_id' => '3','writer_id' => '3','content' => 'Liên hệ với tôi: Project về Laravel + Vuejs','created_at' => '2021-09-25 13:59:35','updated_at' => '2021-09-25 13:59:35')
        );
          

        DB::table('user_contacts') -> insert(
            $user_contacts
        );
    }
}
