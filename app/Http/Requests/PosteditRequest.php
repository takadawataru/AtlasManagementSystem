<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosteditRequest extends FormRequest
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
            'post_title'=>'required|string|max100',
            'post_body'=>'required|string|max2000',
        ];
    }

        public function messages()
 {
  return [
    'post_title.required'=>'入力必須になります',
    'post_title.string'=>'文字列で入力してください',
    'post_title.max100'=>'100文字以下で入力してください',
    'post_body.required'=>'入力必須になります',
    'post_body.string'=>'文字列で入力してください',
    'post_body.max2000'=>'2000文字以下で入力してください',
     ];
 }
}
