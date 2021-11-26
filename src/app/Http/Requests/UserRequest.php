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
    public function rules()
    {
        return [
            'avatar' => ['file', 'image'],
            'name' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'self_introduction' => ['string', 'max:500'],
        ];
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
