<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function test_only_an_authenticated_user_can_create_a_client()
    {
        $clientInfo = Client::factory()->raw();

        $this->post('/clients', $clientInfo)->assertRedirect('login');
    }
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function test_a_user_can_create_a_client()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        $clientInfo = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),

        ];

        $this->post('/clients', $clientInfo)->assertRedirect('/clients');

        $this->assertDatabaseHas('clients', $clientInfo);

        $this->get('/clients')->assertSee($clientInfo['name']);
    }

    /** @test */
    public function a_user_can_view_a_client()
    {
        $client = Client::factory()->create();

        $this->get($client->path())
            ->assertSee($client->name)
            ->assertSee($client->email);
    }

    /** @test */
    public function test_a_client_requires_a_name()
    {
        $this->actingAs(User::factory()->create());

        $clientInfo = Client::factory()->raw(['name' => '']);

        $this->post('/clients', $clientInfo)->assertSessionHasErrors('name');
    }

    /** @test */
    public function test_a_client_requires_an_email()
    {
        $this->actingAs(User::factory()->create());

        $clientInfo = Client::factory()->raw(['email' => '']);

        $this->post('/clients', $clientInfo)->assertSessionHasErrors('email');
    }
}
