<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'id' => '00-0000',
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'course' => $faker->randomElement($array = array ('BSIT','BSCS')),
        'year' => $faker->randomElement($array = array ('1st','2nd','3rd','4th')),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
