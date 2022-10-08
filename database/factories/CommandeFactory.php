<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commande;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Commande::class, function (Faker $faker) {
    return [
        "user_id" => $faker->numberBetween($min = 1, $max = 10),
        "DateLivraison" => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
