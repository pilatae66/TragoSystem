<?php

use Faker\Generator as Faker;

$factory->define(App\Questionnaire::class, function (Faker $faker) {
    return [
        'question_id' => App\Question::inRandomOrder()->first()->id,
        'exam_id' => App\Exam::inRandomOrder()->first()->id,
    ];
});
