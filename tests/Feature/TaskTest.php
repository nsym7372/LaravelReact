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
        $res = $this->deleteJson("api/tasks/{$tasks->first()->id}");
        $res->assertStatus(200);

        $get_res = $this->getJson('api/tasks');
        $get_res->assertJsonCount($tasks->count() - 1);

    }

        /**
     * @test
     */
    public function タイトルが空の場合にエラーとすること()
    {
        $data = [
            'title' => ''
        ];

        $res = $this->postJson('api/tasks', $data);
        $res->assertStatus(422)
            ->assertJsonValidationErrors(['title' => 'タイトルは、必ず指定してください。']);
    }

        /**
     * @test
     */
    public function タイトルが255文字を超える場合にエラーとすること()
    {
        $data = [
            'title' => str_repeat('あ', 256)
        ];
        
        $res = $this->postJson('api/tasks', $data);
        $res->assertStatus(422)
            ->assertJsonValidationErrors(['title' => 'タイトルは、255文字以下にしてください。']);
    }


}
