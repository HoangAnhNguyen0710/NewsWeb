<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required|max:255',
            'creator_id' => [Rule::exists('users', 'id')->where('id', $this->creator_id)],
            'category_id' => ['required', Rule::exists('categories', 'id')->where('id', $this->category_id)],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Đăng bài không thành công! Vui lòng nhập đủ tiêu đề bài viết!",
            'title.max' => "Tiêu đề quá dài, vui lòng nhập tiêu đề dưới 255 kí tự!",
            'category_id.required' => "Đăng bài không thành công! vui lòng chọn category cho bài viết!"
        ];
    }
}
