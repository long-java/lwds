<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([
            UsersTableSeeder::class,
            ChatRoomSeeder::class,
            ChatMessageSeeder::class,
            TagSeeder:: class,
            PostSeeder::class,
            CommentPostSeeder:: class,
            TagPostSeeder:: class,
            UserContactSeeder::class,
            UserDetailSeeder::class,
            UserFollowSeeder::class,
        ]);
    }
}
