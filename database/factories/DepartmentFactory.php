<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        //
        'department_name' => $faker->company,
        'department_email' => $faker->unique()->companyEmail,
        'department_phone' => $faker->e164PhoneNumber,
    ];
});
