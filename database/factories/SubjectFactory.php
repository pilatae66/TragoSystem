<?php

use Faker\Generator as Faker;

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'subTitle' => 'Intro to Computing',
        'instID' => App\User::inRandomOrder()->first()->id,
    ];
});
