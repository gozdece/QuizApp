<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            QuizSeeder::class,
            UserSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            ResultSeeder::class
        ]);
         
    }
}
