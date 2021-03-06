<?php

use Faker\Generator as Faker;

$factory->define(App\Exam::class, function (Faker $faker) {
    return [
        'exam_title' => 'Intro to Computing',
        'exam_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'exam_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'total_items' => $faker->randomElement($array = array ('10', '20', '30', '40')),
        'subject' => 'Intro to Computing',
        'instructor_id' => App\User::inRandomOrder()->first()->id
    ];
});
