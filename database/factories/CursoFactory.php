<?php

use Faker\Generator as Faker;
use App\Curso;

$factory->define(App\Curso::class, function (Faker $faker) {
    $valores = ['Primero', 'Segundo', 'Tercero', 'Cuarto'];
    return [
        'numero' => $valores[rand(0,3)]
    ];
});
