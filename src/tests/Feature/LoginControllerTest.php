<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function ログイン画面にアクセス()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function ログイン処理()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'loginPass'
        ]);
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(action('ArticleController@index'));
    }

    /**
     * @test
     */
    public function アドレス不一致によるエラーチェック()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@test.com',
            'password' => 'loginPass'
        ]);

        $errorMessage = '認証情報と一致するレコードがありません。';
        $this->get(route('login'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function パスワード不一致によるエラーチェック()
    {
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
            'password' => bcrypt('loginPass')
        ]);
        // ログイン処理
        $response = $this->post(route('login'), [
            'email' => 'test@example.com',
            'password' => 'loginPuss'
        ]);

        $errorMessage = '認証情報と一致するレコードがありません。';
        $this->get(route('login'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function ログアウト()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post('logout');
        $this->assertGuest();
    }
}
