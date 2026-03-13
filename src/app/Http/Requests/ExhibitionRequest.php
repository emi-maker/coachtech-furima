<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
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
            'name' => ['required'],
            'description' => ['required', 'max:255'],
            'brabd'=> ['nullable', 'string', 'max:255'],
            'img' => ['required', 'mimes:jpeg,png'],
            'categories' => ['required'],
            'status_id' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages()
{
    return [
        'img.required' => '商品画像を選択してください',
        'img.mimes' => 'jpegまたはpng形式の画像を選択してください',

        'categories.required' => 'カテゴリーを1つ以上選択してください',

        'status_id.required' => '商品の状態を選択してください',

        'name.required' => '商品名を入力してください',

        'description.required' => '商品説明を入力してください',
        'description.max' => '商品説明は255文字以内で入力してください',

        'price.required' => '価格を入力してください',
        'price.numeric' => '価格は数字で入力してください',
        'price.min' => '価格は0円以上で入力してください',
    ];
}
}
