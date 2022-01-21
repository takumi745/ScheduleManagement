<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
     /**
      * プロフィール編集画面
      */
      public function edit($id)
      {
        //ログインユーザ情報を取得
        $auth = Auth::user();

        //ビューに返す
        return view('edit',['auth'=>$auth]);

      }
      
      /**
       * プロフィール更新
       */
      public function update(Request $request , $id)
      {
          //
      }

      /**
       * 登録削除
       */
      public function destroy($id)
      {
          //
      }
}
