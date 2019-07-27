<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = factory(App\Question::class, 1)->create();
        $answers = factory(App\Answer::class, 5)->create();
        $keywords = factory(App\Keyword::class, 3)->create();
    }
}
