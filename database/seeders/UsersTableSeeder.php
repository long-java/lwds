<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = array(
            array('id' => '1','name' => 'Long Decepticon','user_web' => 'decepticon','email' => 'long@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$FTUNrXcTAy8zYwCLYUhv3uj90UQ61b4/8IfU.TzM.K1Dyl5eXqhYS','fb_id' => NULL,'email_id' => NULL,'remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Linh Megatron','user_web' => 'linhmegatron','email' => 'linh@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$FTUNrXcTAy8zYwCLYUhv3uj90UQ61b4/8IfU.TzM.K1Dyl5eXqhYS','fb_id' => NULL,'email_id' => NULL,'remember_token' => NULL,'created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Ẩn Danh','user_web' => 'test','email' => 'test@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$N7VrvJBHKuKSuv1L6kJs9ei1kSHIlicXoEZfQmXQc6524CEtTVltS','fb_id' => NULL,'email_id' => NULL,'remember_token' => NULL,'created_at' => '2021-09-13 14:59:57','updated_at' => '2021-09-13 14:59:57'),
            array('id' => '4','name' => 'Hang','user_web' => 'hangbeautiful','email' => 'hang@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$YfQ8AjE32/htqk5p5GkaYOp.wSr1LZHM95i6T3sCog.snhvQ1KoAu','fb_id' => NULL,'email_id' => NULL,'remember_token' => NULL,'created_at' => '2021-10-05 04:08:57','updated_at' => '2021-10-05 04:08:57'),
            array('id' => '5','name' => 'PingToMe','user_web' => 'pingtome','email' => 'pingtome@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$f3cU.uGZfmU/CFlqXndAI.v32HCwyUXTg2ypbSiz7woVQwPzm6PGu','fb_id' => NULL,'email_id' => NULL,'remember_token' => NULL,'created_at' => '2021-10-06 09:29:15','updated_at' => '2021-10-06 09:29:15'),
            array('id' => '9','name' => 'Tiến Long','user_web' => 'tienlong','email' => 'tienlong@gmail.com','email_verified_at' => NULL,'password' => '$2y$10$s100T.2n.zK7FyhBmo.AZ.EDwrWml5fCwDy2tsM3CdLV5CeUI/162','fb_id' => NULL,'email_id' => NULL,'remember_token' => NULL,'created_at' => '2021-10-07 14:12:42','updated_at' => '2021-10-07 14:12:42')
        );
          

        DB::table('users')->insert(
            $users
        );
    }
}
