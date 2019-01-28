<?php

namespace Tests\Feature;

use App\PaperType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaperTypeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->apiURL = '/api/v1/paper_types/';
    }

    /** @test */
    public function index()
    {
        $this->seed('PaperTypesTableSeeder');

        $this->get($this->apiURL)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    ['id', 'type']
                ]
            ]);

        $this->assertEquals(3, PaperType::count());
    }
}
