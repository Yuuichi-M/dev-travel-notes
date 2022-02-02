<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }

    /**
     * @test
     */
    public function プロフィール表示()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(action('UserController@show',  ["name" => $user->name]));
        $response->assertStatus(200)
            ->assertViewIs('users.show');
    }
    /**
     * @test
     */
    public function ユーザー情報編集画面表示()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->get(route('users.edit', ["name" => $user->name]));
        $response->assertStatus(200)
            ->assertViewIs('users.edit');
    }

    /**
     * @test
     */
    public function ユーザー情報変更()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $data = [
            'name' => 'テスト',
            'email' => 'test@example.com'
        ];
        $response = $this->put(route('users.update', $user->id), $data);
        $this->assertDatabaseHas('users', [
            'name' => 'テスト',
            'email' => 'test@example.com'
        ]);
    }

    /**
     * @test
     */
    public function 退会処理()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $response = $this->delete(route('users.destroy', $user->id));
        $this->assertDeleted('users', [
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }
}
