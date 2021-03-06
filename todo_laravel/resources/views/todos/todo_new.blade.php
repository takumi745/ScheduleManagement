@extends('layouts.test_todo_index')
@section('todo_list_area')
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
<div style="text-align:center">
    <div>todo新規登録</div>
        <form method="POST" action="/todo_save" name="newtodo_form">
            @csrf
            <!-- ログインしている user_id 表示はしない -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('new_user_id') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <input type="hidden" name="new_user_id" value="{{ $new['user_id']}}" required>
            
            <!-- 開始日時 -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('new_start_time') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>開始日時<input type="datetime-local" name="new_start_time" placeholder= "開始日時" value=<?=date('Y-m-d\TH:i', strtotime($new['start_time']))?> required></p>
            
            <!-- 終了日時 -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('new_ending_time') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>終了日時<input type="datetime-local" name="new_ending_time" placeholder= "終了日時" value=<?=date('Y-m-d\TH:i', strtotime($new['ending_time']))?> required></p>
            
            <!-- タイトル -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('new_todo') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>タイトル<input type="text" name="new_todo" placeholder= "タイトル" maxlength="128" value="{{ $new['todo'] }}" required></p>
            
            <!-- 内容-->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('new_comment') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>内容<input type="text" name="new_comment" placeholder= "内容" maxlength="128" value="{{ $new['comment'] }}" ></p>

            <button><a href="/test_todo">キャンセル</a></button>

            <button type="submit" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>追加
            </button>
        </form>
    </div>
</body>