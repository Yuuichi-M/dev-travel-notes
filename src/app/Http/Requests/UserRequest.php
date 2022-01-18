<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    private const GUEST_USER_ID = 3;

    public function rules()
    {
        // ゲストユーザーログイン時
        if (Auth::id() == self::GUEST_USER_ID) {
            return [
                'avatar' => ['file', 'image'],
            ];
        } else { // ゲストユーザー以外
            return [
                'avatar' => ['file', 'image'],
                'name' => ['required', 'string', 'max:16'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
                'self_introduction' => ['string', 'max:100'],
            ];
        }
    }

    public function attributes()
    {
        return [
            'avatar' => 'プロフィール画像',
            'name' => 'タイトル',
            'email' => 'メールアドレス',
            'self_introduction' => '自己紹介',
        ];
    }
}
