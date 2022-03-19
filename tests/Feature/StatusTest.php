<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    public function a_status_can_be_created()
    {
        $this->withoutExceptionHandling();

        $attributes = [
            'name'  => $this->faker->word(),
            'description'   => $this->faker->paragraph(),
        ];

        $this->post('api/statuses', $attributes);

        $this->assertDatabaseHas('statuses', $attributes);

        $this->get('api/statuses')->assertSee($attributes['name']);
    }

    public function a_status_requires_a_name()
    {
        $this->post('api/statuses', [])->assertSessionHasErrors();
    }
}
