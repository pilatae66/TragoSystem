<?php

use Faker\Generator as Faker;

$factory->define(App\Score::class, function (Faker $faker) {
    return [

        'score' => $faker->numberBetween($min = 5, $max = 20),
        'studID' => App\Student::inRandomOrder()->first()->id,
        'subjID' => App\Subject::inRandomOrder()->first()->id,
        'instID' => App\User::inRandomOrder()->first()->id,

    ];
});
