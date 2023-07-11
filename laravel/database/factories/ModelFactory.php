<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Board;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Board::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => str::random(15),
    ];
});