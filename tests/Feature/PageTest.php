<?php

namespace Tests\Feature;

use App\Page;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->apiURL = '/api/v1/pages/';
    }

    /** @test */
    public function index()
    {
        $this->assertEquals(0, Page::count());

        $this->seed('PagesTableSeeder');

        $this->get($this->apiURL)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    ['id', 'pages', 'description']
                ]
            ]);

        $this->assertEquals(2, Page::count());
    }
}
