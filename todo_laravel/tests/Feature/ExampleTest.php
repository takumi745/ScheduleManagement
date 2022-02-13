<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_todo()
    {
        $response = $this->get('/test_todo');

        $response->assertStatus(200)
            ->assertViewIs('todos.test_todo')
            ->assertSee('todoテスト用ページ')
            ->assertSee('todo新規')
            ->assertSee('新規')
            ->click('新規');
                        
    }
}
