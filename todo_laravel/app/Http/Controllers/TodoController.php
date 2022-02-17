<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Validator;

class TodoController extends Controller
{
    public function todo_new()
    {
        $date = $_POST['date'];
        $new['user_id'] = $_POST['login_user_id'];
        $new['start_time'] = $date;
        $new['ending_time'] = $date;
        $new['todo'] = NULL;
        $new['comment'] = NULL;

        return view('todos.todo_new', ['new' => $new], ['err_msg' => NULL ]);
    }

    //データベースにtodoを新規追加する
    public function todo_save(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(),[
            // バリデーションルール
            'new_user_id' => 'required|integer',
            'new_start_time' => 'required',
            'new_ending_time' => 'required|after_or_equal:new_start_time',
            'new_todo' => 'required|max:128',
            'new_comment' => 'max:128',
        ],
        [
            // エラーメッセージ
            'new_user_id.required' => 'ユーザーIDが入力されていません。',
            'new_user_id.integer' => 'ユーザーIDが数値で入力されていません。',
            'new_strat_time.required' => '開始日時を入力してください。',
            'new_ending_time.required' => '終了日時を入力してください。',
            'new_ending_time.after_or_equal' => '開始時間と終了時間を正しく入力してください。',
            'new_todo.required' => 'タイトルを入力してください。',
            'new_todo.max' => 'タイトルは128文字以下で入力してください。',
            'new_comment.max' => '内容は128文字以下で入力してください。',
        ]);


        if ($validator->fails()) {
            // バリデーションエラーがあれば、入力途中のデータを入力フォームへ返す
            $new['user_id'] = $_POST['new_user_id'];
            $new['start_time'] = $_POST['new_start_time'];
            $new['ending_time'] = $_POST['new_ending_time'];
            $new['todo'] = $_POST['new_todo'];
            $new['comment'] = $_POST['new_comment'];

            $errs = $validator->errors();

            return view('todos.todo_new',['new' => $new ], ['err_msg' => $errs ]);
        }
        else{
            // バリデーションエラーがなければ、レコード新規追加
            $save_todo = new \App\Models\Todo;
            $save_todo->status = "active";
            $save_todo->user_id = $_POST['new_user_id'];
            $save_todo->start_time = $_POST['new_start_time'];
            $save_todo->ending_time = $_POST['new_ending_time'];
            $save_todo->todo = $_POST['new_todo'];
            $save_todo->comment = $_POST['new_comment'];
            $save_todo->save();

            return redirect('/test_todo');
        }
    }

    //データベースのレコードを更新する
    public function todo_update(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(),[
            // バリデーションルール
            'edit_id' => 'required|integer',
            'edit_user_id' => 'required|integer',
            'edit_start_time' => 'required',
            'edit_ending_time' => 'required|after_or_equal:edit_start_time',
            'edit_todo' => 'required|max:128',
            'edit_comment' => 'max:128',
        ],
        [
            // エラーメッセージ
            'edit_id.required' => 'todo IDが入力されていません。',
            'edit_id.integer' => 'todo IDが数値で入力されていません。',
            'edit_user_id.required' => 'ユーザーIDが入力されていません。',
            'edit_user_id.integer' => 'ユーザーIDが数値で入力されていません。',
            'edit_strat_time.required' => '開始日時を入力してください。',
            'edit_ending_time.required' => '終了日時を入力してください。',
            'edit_ending_time.after_or_equal' => '開始時間と終了時間を正しく入力してください。',
            'edit_todo.required' => 'タイトルを入力してください。',
            'edit_todo.max' => 'タイトルは128文字以下で入力してください。',
            'edit_comment.max' => '内容は128文字以下で入力してください。',
        ]);

        if ($validator->fails()) {
            // バリデーションエラーがあれば、入力途中のデータを入力フォームへ返す
            $edit['id'] = $_POST['edit_id'];
            $edit['user_id'] = $_POST['edit_user_id'];
            $edit['start_time'] = $_POST['edit_start_time'];
            $edit['ending_time'] = $_POST['edit_ending_time'];
            $edit['todo'] = $_POST['edit_todo'];
            $edit['comment'] = $_POST['edit_comment'];
            
            $errs = $validator->errors();

            return view('todos.todo_edit',['edit' => $edit ], ['err_msg' => $errs ]);
        }
        else{
            // バリデーションエラーがなければ、レコード更新
            $update_todo = Todo::find($_POST['edit_id']);
            $update_todo->status = "active";
            $update_todo->user_id = $_POST['edit_user_id'];
            $update_todo->start_time = $_POST['edit_start_time'];
            $update_todo->ending_time = $_POST['edit_ending_time'];
            $update_todo->todo = $_POST['edit_todo'];
            $update_todo->comment = $_POST['edit_comment'];
            $update_todo->update();
            return redirect('/test_todo');
        }
    }

    // 選択対象の年月日に登録されているtodoの一覧
    public function todo_list()
    {

        $login_user_id = $_POST['login_user_id'];
        $select_date_start = date("y/m/d 23:59:59", strtotime($_POST['date']));
        $select_date_ending = date("y/m/d 00:00:00", strtotime($_POST['date']));

        $list_todos = Todo::where([['status', 'active'], ['user_id', $login_user_id],
            ['start_time', '<=', $select_date_start], ['ending_time', '>=', $select_date_ending], ])
                            ->get();

                            return view('todos.todoslist', ['list_todos' => $list_todos] );
    }

    // 編集対象のtodoを検索する
    public function todo_edit(Request $request)
    {
        $edit_id = $request -> id ; // 検索対象のtodo id
        $edit_todo = Todo::find($edit_id); // 編集対象のtodo検索

        $edit['id'] = $edit_id;
        $edit['user_id'] = $edit_todo->user_id;
        $edit['start_time'] = $edit_todo->start_time;
        $edit['ending_time'] = $edit_todo->ending_time;
        $edit['todo'] = $edit_todo->todo;
        $edit['comment'] = $edit_todo->comment;

        return view('todos.todo_edit', ['edit' => $edit], ['err_msg' => NULL ]);
    }

    // todo削除
    public function todo_delete(Request $request)
    {
        $delete_id = $request -> id ; // 削除対象のtodo id
        $delete_todo = Todo::destroy($delete_id); // todo削除

        return view('todos.test_todo');
    }
}
