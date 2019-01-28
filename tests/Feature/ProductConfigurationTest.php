<?php

namespace Tests\Feature;

use App\ProductConfiguration;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductConfigurationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->apiURL = '/api/v1/product_configurations/';
    }

    /** @test */
    public function index()
    {
        $this->assertEquals(0, ProductConfiguration::count());

        $this->seed('ProductConfigurationsTableSeeder');

        $this->get($this->apiURL)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    [
                        'id',
                        'name',
                        'price',
                        'paper_format',
                        'page',
                        'paper_type',
                    ]
                ]
            ]);

        $this->assertEquals(12, ProductConfiguration::count());
    }

    /** @test */
    public function filteryByFormatPageType()
    {
        $this->assertEquals(0, ProductConfiguration::count());

        $this->seed('ProductConfigurationsTableSeeder');

        $this->get($this->apiURL.'filter/paper_format_id/1/page_id/1/paper_type_id/1')
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    [
                        'id',
                        'name',
                        'price',
                        'paper_format',
                        'page',
                        'paper_type',
                    ]
                ]
            ]);

        $this->assertEquals(12, ProductConfiguration::count());
    }
}
