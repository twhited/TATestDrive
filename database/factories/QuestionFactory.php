<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question_text' => $faker->paragraph,
        'display_text' => $faker->sentence,
        'type' => 'checkbox',
        'required' => 1
    ];
});
