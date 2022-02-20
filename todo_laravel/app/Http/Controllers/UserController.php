<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserConfigRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
/*    public function index(Request $request)
    {
        $users = users::orderBy('created_at', 'asc')->get();
        return view('usersetting.index', [
            'users' => $users,
        ]);
    } */

     /**
      * プロフィール編集画面
      */
      public function edit($id)
      {
        $Auth= Auth::user();
        
        return view('user_setting.edit',['auth'=>$Auth]);

      }
      
      /**
       * プロフィール更新
       */
      public function update(UserConfigRequest $request , $id)
      {
        // 対象レコード取得
        $Auth = User::find($id);

        // リクエストデータ受取
        $form = $request->validated();

        // フォーム要素の評価
        foreach ($form as $key => $value) {

        // nullの場合更新対象から除外する
          if($value == null) {
            unset($form[$key]);
          }
      }

        // レコードアップデート
        $Auth->fill($form)->save();

        //処理が終わったら(/home)にリダイレクト
        return redirect('home');
      }

      /**
       * 登録削除
       */
      public function destroy($id)
      {
          //
      }
}
