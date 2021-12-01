<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageClientsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function test_guests_cannot_manage_clients()
    {
        $client = Client::factory()->create();

        $this->get('/clients')->assertRedirect('login');
        $this->get($client->path())->assertRedirect('login');
        $this->post('/clients', $client->toArray())->assertRedirect('login');
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function test_a_user_can_create_a_client()
    {
        $this->actingAs(User::factory()->create());

        $this->get('/clients/create')->assertStatus(200);

        $clientInfo = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),

        ];

        $this->post('/clients', $clientInfo)->assertRedirect('/clients');

        $this->assertDatabaseHas('clients', $clientInfo);

        $this->get('/clients')->assertSee($clientInfo['name']);
    }

    /** @test */
    public function test_a_user_can_view_their_client()
    {
        $this->be(User::factory()->create());

        $client = Client::factory()->create(['provider_id' => auth()->id()]);

        $this->get($client->path())
            ->assertSee($client->name)
            ->assertSee($client->email);
    }

    /** @test */
    public function test_an_authenticated_user_cannot_see_clients_of_others()
    {
        $this->be(User::factory()->create());

        $client = Client::factory()->create();

        $this->get($client->path())->assertStatus(403);
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
