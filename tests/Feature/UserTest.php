<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        $this->data = [
            'email' => 'tester@email.com',
            'password' => bcrypt('12345678')
        ];
    }

    /** @test */
    public function register()
    {
        $this->assertEquals(0, User::count());

        $this->json('POST', '/api/v1/register', (array) $this->data)
            ->assertStatus(201);

        $this->assertEquals(1, User::count());

        $user = User::first();

        $this->assertEquals($this->data['email'], $user->email);
    }

    /** @test */
    public function login()
    {
        $this->assertEquals(0, User::count());

        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'gogoprint'),
        ]);

        $this->assertEquals(1, User::count());

        $this->json('POST', '/api/v1/login', ['email' => $user->email, 'password' => $password])
            ->assertStatus(200);

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function login_fail()
    {
        $this->assertEquals(0, User::count());

        $user = factory(User::class)->create();

        $this->assertEquals(1, User::count());

        $this->json(
            'POST',
            '/api/v1/login',
            [
                'email' => $this->data['email'],
                'password' => $this->data['password']
            ]
        )
            ->assertStatus(401);
    }

    /** @test */
    public function logout()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'gogoprint'),
        ]);

        $this->json('POST', '/api/v1/login', ['email' => $user->email, 'password' => $password])
            ->assertStatus(200);

        $this->assertAuthenticatedAs($user);

        $this->json('POST', 'api/v1/logout')
            ->assertStatus(200);

        $this->assertGuest();
    }
}
