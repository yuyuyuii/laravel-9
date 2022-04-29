<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Folder;
use App\Models\Task;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $task = new Task();
        $folder = Folder::find(1);
        $tasks = $folder->tasks()->get();
        $response = $this->get('/folders/{$folder}/tasks');


        $response->assertStatus(200);
    }
}
