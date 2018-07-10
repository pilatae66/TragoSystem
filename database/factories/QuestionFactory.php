<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'questionType' => $faker->randomElement($array = array ('Identification','Multiple','Fill', 'ToF', 'Enumeration', 'Match')),
        'category' => $faker->randomElement($array = array ('Knowledge','Application','Understading')),
        'subjID' => App\Subject::inRandomOrder()->first()->id,
        'instID' => App\User::inRandomOrder()->first()->id,

    ];
});
