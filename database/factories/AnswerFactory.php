<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {

    $questionID = App\Question::inRandomOrder()->first();
    return [
        'ansKey' => $faker->word,
        'isAnswerKey' => $faker->randomElement($array = array ('0','1')),
        'questionID' => $questionID->id,
    ];
});
