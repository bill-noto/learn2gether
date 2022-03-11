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
            CommentSeeder::class,
            PostSeeder::class,
            LanguageUserSeeder::class,
            UserRatioSeeder::class
        ]);
    }
}
