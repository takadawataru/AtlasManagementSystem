<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest
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
            'comment'=>'required|string|max:250',
            //
        ];
    }

    public function messages()
 {
  return [
    'comment.required'=>'入力必須になります',
    'comment.string'=>'文字列で入力してください',
    'comment.max250'=>'250文字以下で入力してください',
  ];
}
}
