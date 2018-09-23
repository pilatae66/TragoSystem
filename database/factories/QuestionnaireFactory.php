<?php

use Faker\Generator as Faker;

$factory->define(App\Questionnaire::class, function (Faker $faker) {
    return [
        'question_id' => App\Question::inRandomOrder()->first()->id,
        'test_number' => $faker->randomElement(array(1,2,3)),
        'exam_id' => App\Exam::inRandomOrder()->first()->id,
    ];
});
