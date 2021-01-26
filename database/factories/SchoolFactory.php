<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\School::class, function (Faker $faker) {
    return [
        'school' => $faker->country,
        'user_id' => rand(1, 100)
    ];
});
