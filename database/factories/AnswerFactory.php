<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {

    $questionID = App\Question::inRandomOrder()->first();
    return [
        'ansKey' => $faker->word,
        'questionID' => $questionID->id,
    ];
});
