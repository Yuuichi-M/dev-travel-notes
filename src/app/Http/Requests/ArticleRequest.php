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
            'article_img' => 'nullable|file|image',
            'title' => 'required|string|max:100',
            'url' => 'nullable|string|url',
            'category_id' => 'string|max:2',
            'summary' => 'nullable|string|max:10000',
            'tags' => 'nullable|json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
        ];
    }

    public function attributes()
    {
        return [
            'article_img' => '画像',
            'title' => 'タイトル',
            'url' => 'URL',
            'category_id' => '所在地',
            'summary' => '本文',
            'tags' => 'タグ',
        ];
    }

    //タグ機能　5個まで保存可能
    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
