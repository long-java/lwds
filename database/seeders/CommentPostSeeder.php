<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_posts')->insert([
            [
                'post_id' => '7',
                'user_id' => '2',
                'content' => 'Mình không hiểu lắm nhưng cũng rất hiểu',
            ],


        ]);
    }
}
