<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->name,
        'autor'=>$faker->name,
        'categoria'=>$faker->name,
        'texto'=>$faker->realText(200),
    ];
});
