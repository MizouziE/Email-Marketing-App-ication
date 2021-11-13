<?php

namespace Tests\Feature;

use App\Models\Client;
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

        $this->post('/clients', $clientInfo)->assertRedirect('/clients');

        $this->assertDatabaseHas('clients', $clientInfo);

        $this->get('/clients')->assertSee($clientInfo['name']);
    }

    /** @test */
    public function test_a_client_requires_a_name()
    {
        $clientInfo = Client::factory()->raw(['name' => '']);

        $this->post('/clients', $clientInfo)->assertSessionHasErrors();
    }

    /** @test */
    public function test_a_client_requires_an_email()
    {
        $clientInfo = Client::factory()->raw(['email' => '']);

        $this->post('/clients', $clientInfo)->assertSessionHasErrors();
    }
}
