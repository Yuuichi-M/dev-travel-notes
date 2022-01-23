<?php

namespace Tests\Feature;

use App\User;
use App\Article;
use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testIndex() //投稿一覧表示処理テスト
    {
        $response = $this->get(route('articles.index'));

        $response->assertStatus(200)
            ->assertViewIs('articles.index');
    }

    /**
     * @test
     */
    public function testGuestCreate() //投稿画面テスト(ログイン前)
    {
        $response = $this->get(route('articles.create'));

        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function testAuthCreate() //投稿画面テスト(ログイン後)
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->get(route('articles.create'));

        $response->assertStatus(200)
            ->assertViewIs('articles.create');
    }

    /**
     * @test
     */
    public function testArticleShow() //投稿詳細画面テスト
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create();

        $response = $this->get(route('articles.show', $article->id));
        $response->assertStatus(200)
            ->assertViewIs('articles.show');
    }

    /**
     * @test
     */
    public function testArticleEdit() //投稿編集画面テスト
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $article = factory(Article::class)->create([
            'user_id' => $user->id
        ]);
        $response = $this->get(route('articles.edit', $article->id));
        $response->assertStatus(200)
            ->assertViewIs('articles.edit');
    }
}
