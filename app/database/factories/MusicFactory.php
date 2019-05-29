<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Music;
use App\Models\Categorie;
use App\Models\Artist;
use Faker\Generator as Faker;

$factory->define(Music::class, function (Faker $faker) {
    return [
        'Categorie_id' => Categorie::inRandomOrder()->first()->id,
        'artist_id' => Artist::inRandomOrder()->first()->id,
        'name' => $faker->name,
        'file' => 'https://sample-videos.com/audio/mp3/crowd-cheering.mp3',
    ];
});
