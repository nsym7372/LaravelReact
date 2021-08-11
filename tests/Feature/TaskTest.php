<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function getメソッド()
    {
        $tasks = Task::factory()->count(10)->create();

        $res = $this->getJson('api/tasks');
        $res->assertStatus(200)
            ->assertJsonCount($tasks->count());
    }
}
