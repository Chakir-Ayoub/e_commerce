<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        "Image" => $faker->imageUrl($width = 640, $height = 480),
        "produit_id" => $faker->numberBetween($min = 1, $max= 10),
        "couleur_id" => $faker->numberBetween($min = 1, $max= 10),
    ];
});
