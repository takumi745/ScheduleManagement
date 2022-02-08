@extends('layouts.test_todo_index')
@section('todo_list_area')
<!-- タスク一覧表示 -->
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration:none;
            color:black;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <table border="1" >
                <thead>
                    <th style="width:15%" >開始日時</th>
                    <th style="width:15%" >終了日時</th>
                    <th style="width:30%" >タイトル</th>
                    <th style="width:30%" >内容</th>
                    <th style="width:10%" ></th>
                </thead>
                <tbody>
                    @foreach ($list_todos as $todo)
                    <tr>
                        <td>
                            <div>{{ $todo->start_time }}</div>
                        </td>
                        <td>
                            <div>{{ $todo->ending_time }}</div>
                        </td>
                        <td>
                            <div>{{ $todo->todo }}</div>
                        </td>
                        <td>
                            <div>{{ $todo->comment }}</div>
                        </td>
                        <td>
                            <button style="text-align:center" >
                                <a href="{{ url('/todo_edit/'.$todo->id) }}">編集</a>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection

