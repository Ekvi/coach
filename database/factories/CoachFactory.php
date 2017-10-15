<?php

use Faker\Generator as Faker;

$factory->defineAs(App\Core\Models\User::class, 'coaches', function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'roleId' => 2,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});
