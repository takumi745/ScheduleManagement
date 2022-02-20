<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserConfigRequest extends FormRequest
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
                'name' => ['max:16','nullable'],
                // メールアドレス
                'email' => ['nullable','email',Rule::unique('users')->ignore(Auth::id())
                    // 重複チェック。Rule::unique('テーブル名')->ignore(主キー, '主キーのカラム名')
                ]
            ];
    }
    public function messages()
    {
        return [
          'user_name.max' => 'ユーザー名は16文字以内です。',
          'email.unique' => 'メールアドレスはすでに使用されています。',
        ];
    }
}
