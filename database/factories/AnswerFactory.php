<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'ansKey' => $faker->word,
        'questionID' => App\Question::inRandomOrder()->first(),
    ];
});
