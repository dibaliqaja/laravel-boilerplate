<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => 'Room ' . $faker->randomDigit,
        'quantity' => $faker->randomDigit,
        'price' => $faker->randomNumber(2),
        'hotel_id' => function() {
            return factory(Hotel::class)->create()->id;
        },
    ];
});
