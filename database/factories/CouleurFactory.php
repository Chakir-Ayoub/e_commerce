<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Couleur;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Couleur::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        "Couleur" => $title,
    ];
});
