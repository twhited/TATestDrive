<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'value' => $faker->sentence,
        'question_id' => \App\Question::all()->first()->id
    ];
});
