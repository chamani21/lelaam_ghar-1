<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => \Illuminate\Support\Str::random(10),
        "remember_token" => $faker->name,
        "approved" => 0,
    ];
});
