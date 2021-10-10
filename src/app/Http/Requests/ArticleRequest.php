<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'url' => 'string|url',
            'category_id' => 'required|string|max:2',
            'summary' => 'string|max:10000',
            'article_img' => 'file|image',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'url' => 'URL',
            'category_id' => '所在地',
            'summary' => '本文',
            'article_img' => 'イメージ',
        ];
    }
}
