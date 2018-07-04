<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Jabatan::class, function (Faker $faker) {
    return [
        'nama_jabatan' => $faker->unique()->name,
    ];
});
