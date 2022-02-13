<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
      public function update(Request $request , $id)
      {
        // 対象レコード取得
        $auth = User::find($id);

        // リクエストデータ受取
        $form = $request->only('name','email');

        // レコードアップデート
        $auth->$form->save();

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
