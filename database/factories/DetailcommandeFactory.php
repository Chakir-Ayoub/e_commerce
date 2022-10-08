<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Detailcommande;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Detailcommande::class, function (Faker $faker) {
    return [
        "commande_id" => $faker->numberBetween($min = 1, $max= 10),
        "produit_id" => $faker->numberBetween($min = 1, $max= 10),
        "image_id" => $faker->numberBetween($min = 1, $max= 10),
        "QteCommande" => $faker->numberBetween($min = 1, $max= 50),
    ];
});
