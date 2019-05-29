<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Categorie;
use Faker\Generator as Faker;

$factory->define(Categorie::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'picture' => '/assets/albums/' . $faker->image(public_path('assets/albums'),400,400, 'nature', false),
    ];
});
