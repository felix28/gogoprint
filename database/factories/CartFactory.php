<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    /*return [
        'user_id' => 1,
        'product_configuration_id' => 1,
        'configuration_price' => 1,
        'price_per_piece' => 1,
        'quantity' => 1,
        'production_days' => 1,
        'subtotal' => 1,
        'vat' => 1,
        'shipping_fee' => 1,
        'total' => 1,
        'delivery_date' => '2019-01-01'
    ];*/
    /*return [
           'user_id' => $faker->randomDigitNotNull,
        'product_configuration_id' => $faker->randomDigitNotNull,
        'configuration_price' => $faker->randomFloat(2, 1),
        'price_per_piece' => $faker->randomFloat(2, 1),
        'quantity' => $faker->randomNumber(9, true),
        'production_days' => $faker->randomDigitNotNull,
        'subtotal' => $faker->randomFloat(2, 1),
        'vat' => $faker->randomFloat(2, 1),
        'shipping_fee' => $faker->randomFloat(2, 1),
        'total' => $faker->randomFloat(2, 1),
        'delivery_date' => $faker->date('Y-m-d', '4 days')
    ];*/
});
