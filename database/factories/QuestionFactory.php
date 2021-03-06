<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'questionType' => $faker->randomElement($array = array ('Identification','Multiple','ToF','Enumeration', 'Essay')),
        'category' => $faker->randomElement($array = array ('Knowledge','Application','Understanding')),
        'topic' => $faker->randomElement($array = array ('If Else','Display','Input')),
        'instID' => App\User::inRandomOrder()->first()->id,

    ];
});
