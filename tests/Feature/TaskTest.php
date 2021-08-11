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
    public function データを取得できること()
    {
        $tasks = Task::factory()->count(10)->create();

        $res = $this->getJson('api/tasks');
        $res->assertStatus(200)
            ->assertJsonCount($tasks->count());
    }

    /**
     * @test
     */
    public function データを登録できること()
    {
        $data = [
            'title' => 'テストたいとる'
        ];

        $res = $this->postJson('api/tasks', $data);
        $res->assertStatus(201)
            ->assertJsonFragment($data);
    }

        /**
     * @test
     */
    public function データを更新できること()
    {
        $task = Task::factory()->create();
        $task->title = '書き換えた';

        // dd($task);
        $res = $this->patchJson("api/tasks/{$task->id}", $task->toArray());

        $res->assertStatus(200)    //assertOk
            ->assertJsonFragment($task->toArray());
    }

            /**
     * @test
     */
    public function データを削除できること()
    {
        $tasks = Task::factory()->count(10)->create();

        $res = $this->deleteJson("api/tasks/1");
        $res->assertStatus(200);

        $get_res = $this->getJson('api/tasks');
        $get_res->assertJsonCount($tasks->count() - 1);

    }
}
