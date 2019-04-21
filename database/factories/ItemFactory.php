<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'item_pic' => $faker->url,
        'is_available' => $faker->randomElement(['yes', 'no']),
        'price' => $faker->numberBetween(100, 200),
        'description' => $faker->text,
        'category_id' => function() {
            return factory(App\Category::class)->create()->id;
        },
        'food_type' => $faker->randomElement(['veg','non veg']),
    ];
});
