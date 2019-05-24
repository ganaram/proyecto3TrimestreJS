<?php

use Faker\Generator as Faker;
use App\Asignatura;

$factory->define(App\Asignatura::class, function (Faker $faker) {
    $name = ucfirst($faker->words(rand(1,2),true));
    return [
        'name' => $name,
        'slug' => str_slug($name,"-"),
        'hours' => random_int(1,16),
        'description' => $faker->text(300)
    ];
});