<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Demand;
use Faker\Generator as Faker;

$factory->define(Demand::class, function (Faker $faker) {
    $cities=['United Arab Emirates','Turkey','Tunisia','South Africa','Saudi Arabia','Egypt','Brazil'];
    $port=rand(0,1);
    $cat=rand(0,1);
    return [
        'title'=>$faker->sentence(rand(5,10)),
        'desc'=>$faker->paragraph(rand(2,5)),
        'country'=>$cities[rand(0,6)],
        'name'=>$faker->name,
        'email'=>$faker->safeEmail,
        'phone'=>$faker->phoneNumber,
        'port'=>($port==1)?$faker->sentence:null,
        'showPhone'=>rand(0,1),
        'category_id'=>($cat==1)?\App\Category::inRandomOrder()->first()->id:0,
    ];
});
