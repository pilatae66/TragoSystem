<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'subjID' => App\Subject::inRandomOrder()->first()->id,
        'instID' => App\User::inRandomOrder()->first()->id,

    ];
});
