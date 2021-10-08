<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_details = array(
            array('id' => '1','user_id' => '1','avatar' => 'https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.6435-9/146499599_1819502324892968_7953567518336701893_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=GF8tISI8LCQAX-zZMp5&_nc_ht=scontent.fsgn2-3.fna&oh=7d9fbbebbc21018dbf8945f3995aff9d&oe=6167D356','contact' => '14 Nguyễn Chí Thanh','follow' => '2','follower' => '3','tag_care' => '1,3','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','user_id' => '2','avatar' => 'https://gamek.mediacdn.vn/133514250583805952/2021/7/15/photo-1-1626325991293621230585.jpg','contact' => '12 Điện Biên Phủ','follow' => '1','follower' => '2','tag_care' => '2,3','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','user_id' => '3','avatar' => 'https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png','contact' => '34 Nguyễn Du','follow' => '4','follower' => '1','tag_care' => '3','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','user_id' => '4','avatar' => 'https://kenh14cdn.com/thumb_w/660/2019/8/27/6625837813537884714440914756382156664602624o-1566876775503776987849.jpg','contact' => '121 Ông Ích Khiêm','follow' => NULL,'follower' => NULL,'tag_care' => NULL,'created_at' => '2021-10-05 04:08:57','updated_at' => '2021-10-05 04:08:57'),
            array('id' => '5','user_id' => '5','avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDxmv1SkYKw9owXtGxCVEDdetohpi7nB-W6Q&usqp=CAU','contact' => NULL,'follow' => NULL,'follower' => NULL,'tag_care' => NULL,'created_at' => '2021-10-06 09:29:15','updated_at' => '2021-10-06 09:29:15'),
            array('id' => '9','user_id' => '9','avatar' => 'https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png','contact' => NULL,'follow' => NULL,'follower' => NULL,'tag_care' => NULL,'created_at' => '2021-10-07 14:12:42','updated_at' => '2021-10-07 14:12:42')
        );


        DB::table('user_details')->insert(
            $user_details
        );
    }
}
