<?php

namespace Database\Seeders;

use App\Models\UserRatio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRatioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRatio::factory(15)->create();

        UserRatio::create([
            'user_id' => 19
        ]);

        UserRatio::create([
            'user_id' => 20
        ]);

        UserRatio::create([
            'user_id' => 21
        ]);

        UserRatio::create([
            'user_id' => 22
        ]);
    }
}
