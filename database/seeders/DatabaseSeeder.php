<?php

namespace Database\Seeders;

use App\Models\Language;
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
        $this->call([
            UserSeeder::class,
            LanguageSeeder::class,
            MeetingSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            LanguageUserSeeder::class,
        ]);
    }
}
