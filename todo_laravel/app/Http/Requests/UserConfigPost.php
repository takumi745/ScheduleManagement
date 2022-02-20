<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserConfigPost extends FormRequest
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
    public function rules(Request $request)
    {
        return [
                // ユーザー名
                'name' => ['string','max:16'],
                // メールアドレス
                'email' => ['string','email',Rule::unique('users')->ignore(Auth::id())
                    // 重複チェック。Rule::unique('テーブル名')->ignore(主キー, '主キーのカラム名')
                ]
            ];
    }
    public function messages()
    {
        return [
          'user_name.max' => 'ユーザー名は16文字以内です。',
          'email.unique'       => 'メールアドレスはすでに使用されています。',
        ];
    }
}
}
