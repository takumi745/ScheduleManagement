<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;

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
    public function rules()
    {
        return [
        'name' => ['max:16','nullable'],//null許容
        'email' => ['nullable','email',Rule::unique('users')->ignore(Auth::id())
        // 重複チェック。Rule::unique('テーブル名')->ignore(主キー, '主キーのカラム名'（今回はログインから取得）)null許容
        ]
        ];
    }
}
