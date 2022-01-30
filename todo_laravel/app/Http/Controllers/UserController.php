<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


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
        $id = Auth::id();
        //ビュー返す
        return view('edit',['id'=>$id]);

      }
      
      /**
       * プロフィール更新
       */
      public function update(Request $request , $id)
      {
        $member=Member::findOrFail($id);

        $member->name=$request->input('name');
        $member->phone=$request->input('phone');
        $member->email=$request->input('email');

        //DBに保存
        $member->save();

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
