<?php

namespace Tests\Feature;

use App\Cart;
use App\ProductConfiguration;
use App\ProductQuantityPrice;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create()
    {
        $user = factory('App\User')->create();
        $this->seed('ProductConfigurationsTableSeeder');
        $this->seed('ProductQuantityPricesTableSeeder');

        $product_configuration  = ProductConfiguration::first();
        $product_quantity_price = ProductQuantityPrice::first();

        $this->assertEquals(0, Cart::count());

        $this->data = [
            'user_id' => $user['id'],
            'product_configuration_id' => $product_configuration['id'],
            'configuration_price' => $product_configuration['price'],
            'price_per_piece' => $product_quantity_price['price_per_piece'],
            'quantity' => $product_quantity_price['quantity'],
            'production_days' => 4,
            'subtotal' => 1,
            'vat' => 1,
            'shipping_fee' => 1,
            'total' => 1,
            'delivery_date' => '2019-01-01'
        ];

        $this->json('POST', '/api/v1/carts', (array) $this->data)
            ->assertStatus(201);

        $this->assertEquals(1, Cart::count());

        $cart = Cart::first();

        $this->assertEquals($this->data['user_id'], $cart->user_id);
        $this->assertEquals($this->data['total'], $cart->total);
    }
}
