<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\vaccin;
use App\Model;
use Faker\Generator as Faker;

$factory->define(vaccin::class, function (Faker $faker) {
    static $i=1;
    return [
        'id_pays' => 25,
        'nb_vac' => $faker->numberBetween(0, 420),
        'created_at' => '2021-06-'.$i++.' 08:37:17'
    ];
});
