<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'main_category_name'=>'required|max:100|string|unique:main_categories,main_category',
            'main_category_id'=>'required|exists:main_categories,main_category_id',

            //
        ];
    }

        public function messages()
    {
        return [
    'main_category_name.required'=>'入力必須になります',
    'main_category_name.max'=>'100文字以下で入力してください',
    'main_category_name.string'=>'文字列で入力してください',
    'main_category_name.unique'=>'このメインカテゴリーは既に登録されています',
    'main_category_id.required'=>'入力必須になります',
    'main_category_id.exists:main_categories,main_category_id'=>'このメインカテゴリーは登録されていません',
        ];
    }
}
