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
    <!-- アラート表示に必要なjavascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        function edit_delete(){
            var resalt = confirm("削除しますか?");
                if (resalt) {
                    window.location.href = '/todo_delete/'+ edittodo_form.edit_id.value;
                } else {
                    return false;
                }
        }
    </script>
</head>
<body>
    <div style="text-align:center">
        <div>todo編集</div>
        <form method="POST" action="/todo_update" name="edittodo_form">
            @csrf
            <!-- 編集対象のtodo id -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('edit_id') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <input type="hidden" name="edit_id" value="{{ $edit['id'] }}" required>

            <!-- user id -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('edit_user_id') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <input type="hidden" name="edit_user_id" value="{{ $edit['user_id'] }}" required>

            <!-- 開始日時 -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('edit_start_time') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>開始日時<input type="datetime-local" name="edit_start_time" placeholder= "開始日時" value=<?=date('Y-m-d\TH:i', strtotime($edit['start_time']))?> required></p>

            <!-- 終了日時 -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('edit_ending_time') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>終了日時<input type="datetime-local" name="edit_ending_time" placeholder= "終了日時" value=<?=date('Y-m-d\TH:i', strtotime($edit['ending_time']))?> required></p>

            <!-- タイトル -->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('edit_todo') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>タイトル<input type="text" name="edit_todo" placeholder= "タイトル" maxlength="126" value="{{ $edit['todo'] }}" ></p>

            <!-- 内容-->
            @if(!empty($err_msg))
                @if ($err_msg->any())
                    @foreach($err_msg->get('edit_comment') as $message)
                        <p> {{ $message }} </p>
                    @endforeach
                @endif
            @endif
            <p>内容<input type="text" name="edit_comment" placeholder= "内容" maxlength="126" value="{{ $edit['comment'] }}" ></p>

            <button><a href="/test_todo">キャンセル</a></button>
            <input type="button" class="btn btn-danger" name="delete" onclick="return edit_delete()" value="削除">
            <input type="submit" class="btn btn-danger" name="chkeck" value="編集">
        </form>
    </div>
</body>
@endsection
