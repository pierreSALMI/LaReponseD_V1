<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'birthDate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'telNbr' => $faker->tollFreePhoneNumber,
        'address' => $faker->address,
    ];
});
