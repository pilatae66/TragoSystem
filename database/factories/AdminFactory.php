<?php

use Faker\Generator as Faker;
use App\Admin;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'id' => '00-0000',
        'firstname' => 'super',
        'lastname' => 'admin',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
     ];
});
