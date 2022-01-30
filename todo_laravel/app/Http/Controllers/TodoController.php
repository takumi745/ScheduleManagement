<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function todo_new()
    {
        $date = $_POST['date'];
        
        $new['user_id'] = $_POST['login_user_id'];
        $new['start_time'] = $date;
        $new['ending_time'] = $date;
        $new['todo'] = NULL;
        $new['comment'] = NULL;

        //表示テスト用データ
        //$new['start_time'] = date("Y-m-d H:i:s", strtotime('1975-01-16 15:00'));
        //$new['ending_time'] = date("Y-m-d H:i:s", strtotime('2020-02-03 16:00'));
        //$new['todo'] = "todo-test";
        //$new['comment'] = "comment-test";

        return view('todos.todo_new', ['date'=>$date],['new' => $new]);
    }

    //データベースにtodoを新規追加する
    public function todo_save()
    {

        $save_todo = new \App\Models\Todo;
        $save_todo -> status = "active";
        $save_todo -> user_id = $_POST['new_user_id'];
        $save_todo -> start_time = $_POST['new_start_time'];
        $save_todo -> ending_time = $_POST['new_ending_time'];
        $save_todo -> todo = $_POST['new_todo'];
        $save_todo ->  comment = $_POST['new_comment'];
        $save_todo -> save();

        return redirect('/test_todo');
    }

        //データベースにtodoを新規追加する
    public function todo_update()
    {

        $update_todo = Todo::find($_POST['edit_id']);
        $update_todo -> status = "active";
        $update_todo -> user_id = $_POST['edit_user_id'];
        $update_todo -> start_time = $_POST['edit_start_time'];
        $update_todo -> ending_time = $_POST['edit_ending_time'];
        $update_todo -> todo = $_POST['edit_todo'];
        $update_todo ->  comment = $_POST['edit_comment'];
        $update_todo -> update();

        return redirect('/test_todo');
    }


    public function todo_list()
    {

        $login_user_id = $_POST['login_user_id'];
        $select_date_start = date("y/m/d 23:59:59", strtotime($_POST['date']));
        $select_date_ending = date("y/m/d 00:00:00", strtotime($_POST['date']));


        $list_todos = Todo::where([['status', 'active'], ['user_id', $login_user_id],
            ['start_time', '<=', $select_date_start], ['ending_time', '>=', $select_date_ending], ])
                            ->get();

        //alert("test");

        return view('todos.todoslist', ['list_todos' => $list_todos,] );

    }


    public function todo_edit(Request $request)
    {
        $edit_id = $request -> id ;

        //$edit_todo = Todo::where([['id', $edit_id],])
        //                    ->get();

        $edit_todo = Todo::find($edit_id);

        $edit['id'] = $edit_id;
        $edit['user_id'] = $edit_todo->user_id;
        $edit['start_time'] = $edit_todo->start_time;
        $edit['ending_time'] = $edit_todo->ending_time;
        $edit['todo'] = $edit_todo->todo;
        $edit['comment'] = $edit_todo->comment;

        //表示テスト用データ
        //$new['start_time'] = date("Y-m-d H:i:s", strtotime('1975-01-16 15:00'));
        //$new['ending_time'] = date("Y-m-d H:i:s", strtotime('2020-02-03 16:00'));
        //$new['todo'] = "todo-test";
        //$new['comment'] = "comment-test";

        return view('todos.todo_edit', ['edit' => $edit]);

    }

    public function todo_delete(Request $request)
    {
        $delete_id = $request -> id ;


        //$edit_todo = Todo::where([['id', $edit_id],])
        //                    ->get();

        $delete_todo = Todo::destroy($delete_id);


        return view('todos.test_todo');

    }






    public function test_delete()
    {
        return view('test_todo');
    }
}
