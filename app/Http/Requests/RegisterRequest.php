<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'over_name'=>'required|string|max:10',
            'under_name'=>'required|string|max:10',
            'over_name_kana'=>'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'under_name_kana'=>'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'mail_address'=>'required|email|unique:users|max:100',
            'sex'=>'required|in:1.2.3',
            'old_year'=>'required',
            'old_month'=>'required',
            'old_day'=>'required',
            'role'=>'required|in:1.2.3.4',
            'password'=>'required|between:8,30|confirmed',

        ];
    }



    public function messages()
{
  return [
    'over_name.required'=>'入力必須になります',
    'over_name.string'=>'文字列で入力してください',
    'over_name.max:10'=>'10文字以下で入力してください',
    'under_name.required'=>'入力必須になります',
    'under_name.string'=>'文字列で入力してください',
    'under_name.max:10'=>'10文字以下で入力してください',
    'over_name_kana.required'=>'入力必須になります',
    'over_name_kana.string'=>'文字列で入力してください',
    'over_name_kana.regex:/\A[ァ-ヴー]+\z/u'=>'カタカナで入力してください',
    'over_name_kana.max:30'=>'30文字以下で入力してください',
    'under_name_kana.required'=>'入力必須になります',
    'under_name_kana.string'=>'文字列で入力してください',
    'under_name_kana.regex:/\A[ァ-ヴー]+\z/u'=>'カタカナで入力してください',
    'under_name_kana.max:30'=>'30文字以下で入力してください',
    'mail_address.required'=>'入力必須になります',
    'mail_address.email'=>'メールアドレス形式で入力してください',
    'mail_address.unique:users'=>'登録済みのメールアドレスです',
    'mail_address.max:100'=>'100文字以下で入力してください',
    'sex.required'=>'入力必須になります',
    'sex.in:1.2.3'=>'男性、女性、その他以外無効です',
    'old_year.required'=>'入力必須になります',
    'old_month.required'=>'入力必須になります',
    'old_day.required'=>'入力必須になります',
    'role.required'=>'入力必須になります',
    'role.in'=>'講師(国語)、講師(数学)、教師(英語)、生徒以外無効です',
    'password.required'=>'入力必須になります',
    'password.between:8,30'=>'8文字以上30文字以下で入力してください',
    'password.confirmed'=>'確認用と相違があります',
    ];
    }
}
