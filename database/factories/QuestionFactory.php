<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'questionType' => $faker->randomElement($array = array ('Identification','Multiple','Fill', 'ToF', 'Enumeration', 'Match')),
        'category' => $faker->randomElement($array = array ('Knowledge','Application','Understading')),
        'subjID' => App\Subject::inRandomOrder()->first()->id,
        'instID' => App\User::inRandomOrder()->first()->id,
        'term' => $faker->randomElement($array = array ('Prelim','Midterm','Prefinal','Final')),
        'difficulty' => $faker->randomElement($array = array ('Easy','Medium','Hard')),

    ];
});
