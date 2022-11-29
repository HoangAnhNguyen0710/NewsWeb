<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required', Rule::exists('users', 'id')->where('id', $this->user_id)],
            'article_id' => ['required', Rule::exists('articles', 'id')->where('id', $this->article_id)],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => "Thiếu thông tin người like/unlike!",
            'article_id.required' => "Thiếu thông tin bài viết được like/unlike!"
        ];
    }
}
