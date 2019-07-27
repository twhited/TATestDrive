<?php

use Faker\Generator as Faker;

$factory->define(App\Keyword::class, function (Faker $faker) {
    return [
        'value' => $faker->word,
        'question_id' => \App\Question::all()->first()->id
    ];
});
