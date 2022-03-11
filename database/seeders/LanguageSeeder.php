<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'language' => 'Serbian'
        ]);

        Language::create([
            'language' => 'Bosnian'
        ]);

        Language::create([
            'language' => 'Croatian'
        ]);

        Language::create([
            'language' => 'Macedonian'
        ]);

        Language::create([
            'language' => 'Montenegrin'
        ]);

        Language::create([
            'language' => 'Greek'
        ]);

        Language::create([
            'language' => 'Turkish'
        ]);

        Language::create([
            'language' => 'Albanian'
        ]);

        Language::create([
            'language' => 'Bulgarian'
        ]);

        Language::create([
            'language' => 'Slovenian'
        ]);

        Language::create([
            'language' => 'Romanian'
        ]);
    }
}
