<?php

use Faker\Generator as Faker;

$factory->define(App\Exam::class, function (Faker $faker) {
    return [
        'exam_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'exam_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'exam_room' => $faker->randomElement($array = array ('A201', 'A202', 'A203', 'A204')),
        'subject_id' => App\Subject::inRandomOrder()->first()->id,
        'instructor_id' => App\User::inRandomOrder()->first()->id,
    ];
});
