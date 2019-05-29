<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Artist;
use Faker\Generator as Faker;

$factory->define(Artist::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'picture' => '/assets/artists/' . $faker->image(public_path('assets/artists'),400,400, 'people', false),
    ];
});
