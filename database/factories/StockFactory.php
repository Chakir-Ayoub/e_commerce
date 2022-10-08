<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        "prouduit_id" => $faker->numberBetween($min = 1, $max= 10),
        "couleur_id" => $faker->numberBetween($min = 1, $max= 10),
        "taille_id" => $faker->numberBetween($min = 1, $max= 10),
        "Qte" => $faker->numberBetween($min = 1, $max= 50),
    ];
});
