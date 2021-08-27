<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\covid;
use App\Model;
use Faker\Generator as Faker;

$factory->define(covid::class, function (Faker $faker) {
    static $i=3;
    return [
        'id_ville' => $i++,
        'nb_cas' => $faker->numberBetween(0, 200),
        'nb_ret' => $faker->numberBetween(0, 100),
        'nb_mort' => $faker->numberBetween(0, 100),
        'created_at' => '2021-08-31 08:37:17'
    ];
});

