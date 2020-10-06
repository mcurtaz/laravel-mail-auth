<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'  => $faker -> word(),         
        'body'   => $faker -> text(),     
        'like'   => $faker -> randomNumber(),
        'tag'    => implode(',', $faker -> words())
    ];
});