<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Taille;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Taille::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        "Taille" => $title,
    ];
});
