<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ContentTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function test_a_user_can_create_content()
    {
        // $this->withoutExceptionHandling();
        $this->actingAs(User::factory()->create());

        // $this->get('/content/create')->assertStatus(200);

        $content = [
            'title' => $this->faker->name(),
            'body' => $this->faker->paragraph(),

        ];

        $this->post('/content', $content)->assertRedirect('/content');

        $this->assertDatabaseHas('content', $content);

        $this->get('/content')->assertSee($content['name']);
    }
}
