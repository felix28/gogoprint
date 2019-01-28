<?php

namespace Tests\Feature;

use App\PaperFormat;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaperFormatTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->apiURL = '/api/v1/paper_formats/';
        //$this->jsonStructure = ['width', 'height', 'unit'];
        //$this->data = ['task_id' => 3, 'user_id' => 6, 'comment' => 'bla bla bla.', 'unread' => 1];
    }

    /** @test */
    public function index()
    {
        $this->seed('PaperFormatsTableSeeder');

        $this->get($this->apiURL)
            ->assertStatus(200)
            ->assertJsonStructure([
                "data"  => [
                    ['width', 'height', 'unit']
                ]
            ]);

        $this->assertEquals(2, PaperFormat::count());
    }
}
