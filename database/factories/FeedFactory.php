<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feed;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Feed::class, function (Faker $faker) {
    $cities = ['Istanbul', 'Adana', 'Hatay', 'Ankra'];
    return [
        'name' => $faker->sentence(rand(4, 10)),
        'description' => $faker->sentence(rand(25, 35)),
        'email' => $faker->safeEmail(),
        'phone' => $faker->phoneNumber(),
        'city' => $cities[rand(0, 3)],
        'website' => $faker->url,
        'tags' => function () {
            $k = rand(1, 7);
            $tag = '';
            $tags = ['maxime', 'ad', 'quae', 'necessitatibus', 'voluptatem', 'sunt', 'natus', 'quia', 'accusantium', 'ullam', 'doloribus', 'ut', 'nihil', 'consectetur', 'reiciendis', 'consectetur', 'sed', 'consequatur', 'animi', 'voluptatem'];
            for ($i = 1; $i <= $k; $i++) {
                $r = rand(0, 19);
                $tag = $tag . $tags[$r] . ',';
                $tago = \App\Tag::where('name', $tags[$r])->get()->count();
                if ($tago == 0) {
                    $newtag = new \App\Tag();
                    $newtag->name = $tags[$r];
                    $newtag->lang = 'tr';
                    $newtag->save();
                }
            }
            $tag = rtrim($tag, ", ");

            return $tag;
        },


    ];
});
