<?php

namespace Tests\Feature;

use App\ProductQuantityPrice;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductQuantityPriceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->apiURL = '/api/v1/product_quantity_prices/';
    }

    /** @test */
    public function index()
    {
        $this->assertEquals(0, ProductQuantityPrice::count());

        $this->seed('ProductQuantityPricesTableSeeder');

        $this->get($this->apiURL)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    [
                        'id',
                        'product_configuration',
                        'quantity',
                        'price_per_piece',
                        'unit_price',
                        'base_price',
                        'total_one_day',
                        'total_two_days',
                        'total_three_days'					]
                ]
            ]);

        $this->assertEquals(60, ProductQuantityPrice::count());
    }

    /** @test */
    public function filterByProductConfigurationID()
    {
        $this->seed('ProductQuantityPricesTableSeeder');

        $this->get($this->apiURL.'filter/product_configuration_id/1')
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    [
                        'id',
                        'product_configuration',
                        'quantity',
                        'price_per_piece',
                        'unit_price',
                        'base_price',
                        'total_one_day',
                        'total_two_days',
                        'total_three_days'
                    ]
                ]
            ]);
    }

    /** @test */
    public function show()
    {
        $this->seed('ProductQuantityPricesTableSeeder');

        $this->get($this->apiURL.'1')
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'product_configuration',
                'quantity',
                'price_per_piece',
                'unit_price',
                'base_price',
                'total_one_day',
                'total_two_days',
                'total_three_days'
            ]);
    }
}
