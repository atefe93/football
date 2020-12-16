<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'user_id' => random_int(\DB::table('users')->min('id'), \DB::table('users')->max('id')),
        'team_id' => random_int(\DB::table('teams')->min('id'), \DB::table('teams')->max('id')),
        'first_name' => $this->faker->name,
        'last_name' => $this->faker->lastname,

    ];
});
