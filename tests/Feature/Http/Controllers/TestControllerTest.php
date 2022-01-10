<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TestControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function test_delete_user()
    {
        // Create a user
        $user = User::factory()->create();

        // Make a request to delete user
        $response = $this->delete("users/{$user->id}");

        $response->assertStatus(200);
    }
}
