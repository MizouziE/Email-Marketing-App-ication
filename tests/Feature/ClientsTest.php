<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function test_a_user_can_create_a_client()
    {
        $this->withoutExceptionHandling();

        $clientInfo = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),

        ];

        $this->post('/clients', $clientInfo);

        $this->assertDatabaseHas('clients', $clientInfo);

        $this->get('/clients')->assertSee($clientInfo['name']);
    }
}
