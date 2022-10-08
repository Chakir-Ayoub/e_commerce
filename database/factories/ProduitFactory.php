<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Produit::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        "NomP" => $title,
        "Prix" => $faker->numberBetween($min = 100, $max= 900),
        "Description" => $faker->paragraph(),
        "Categorie" => $title,
        "SousCategorie" => $title,
    ];
});
