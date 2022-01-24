<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     */
    public function testRegisterView() //ユーザー登録画面表示テスト
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200)
            ->assertViewIs('auth.register');
    }

    /**
     * @test
     */
    public function testRegister() //ユーザー登録処理テスト
    {
        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $response->assertRedirect(action('ArticleController@index'));
    }

    /**
     * @test
     */
    public function testNoNameEnteredError() //名前未入力エラーテスト
    {

        $response = $this->post(route('register'), [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = 'アカウント名は必ず指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function testOverWordCountError() //文字数超過エラーテスト
    {
        $response = $this->post(route('register'), [
            'name' => 'testUsertestUsertestUsertestUsertestUsertestUser',
            'email' => 'test@example.com',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = 'アカウント名は、16文字以下で指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function testNoAddressEnteredError() //メールアドレス未入力エラーテスト
    {
        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => '',
            'password' => 'testexample',
            'password_confirmation' => 'testexample',
        ]);

        $errorMessage = 'メールアドレスは必ず指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    }

    public function testNoPasswordEnteredError() //パスワード未入力エラーテスト
    {
        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $errorMessage = 'パスワードは必ず指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function testShortPasswordError() //パスワード最短文字数以下エラーテスト
    {
        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'password' => 'test',
            'password_confirmation' => 'test',
        ]);

        $errorMessage = 'パスワードは、8文字以上で指定してください。';
        $this->get(route('register'))->assertSee($errorMessage);
    }

    /**
     * @test
     */
    public function testPasswordMismatchError() //パスワード不一致エラーテスト
    {
        $response = $this->post(route('register'), [
            'name' => 'testUser',
            'email' => 'test@example.com',
            'password' => 'testexample',
            'password_confirmation' => 'testexamples',
        ]);

        $errorMessage = 'パスワードと、確認フィールドとが、一致していません。';
        $this->get(route('register'))->assertSee($errorMessage);
    }
}
