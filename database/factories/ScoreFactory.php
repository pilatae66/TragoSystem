<?php

use Faker\Generator as Faker;

$factory->define(App\Score::class, function (Faker $faker) {
    return [

        'score' => $faker->numberBetween($min = 5, $max = 20),
        'scoreType' => $faker->randomElement($array = array ('partial','essay')),
        'exam_id' => App\Exam::inRandomOrder()->first()->id,
        'student_id' => App\Student::inRandomOrder()->first()->id,

    ];
});
