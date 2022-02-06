<!-- @extends('layouts.test_todo_index') -->

<!-- @section('todo_list_area') -->


<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- アラート表示に必要なjavascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    function edit_delete(){
        var resalt = confirm("削除しますか?");

            if (resalt) {
                
                window.location.href = '/todo_delete/'+ edittodo_form.edit_id.value;
                //return true;
            } else {
                return false;
            }
    }
</script>
<script type="text/javascript">
    //新規todo 入力データチェック [追加]ボタン押された時に実行
    function edit_check(){

            //開始時間と終了時間が逆になっていれば
            if (edittodo_form.edit_start_time.value > edittodo_form.edit_ending_time.value){

                //alert("開始時間と終了時間の入力が間違っています");    //エラーメッセージを出力
                swal('開始時間と終了時間の入力が間違っています'); //sweetalert.js
                return false;    //追加ボタン無効

            //タイトルが入力されていなければ
            }else if( edittodo_form.edit_todo.value == "" ){
                swal('タイトルが入力されていません'); //sweetalert.js
                return false;    //追加ボタン無効

            //入力データに問題がなければ
            }else{
                //開始時間と終了時間が正しい時
                return true;    //追加ボタン有効
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
    <!-- 編集対象のtodo id 表示させない type="hidden" -->
    <input type="hidden" name="edit_id" value="{{ $edit['id'] }}" required>

    <!-- user id -->
    @if(!empty($err_msg))
        @if ($err_msg->any())
            @foreach($err_msg->get('edit_user_id') as $message)
                <p> {{ $message }} </p>
            @endforeach
        @endif
    @endif
    <!-- user_id 表示させない type="hidden" -->
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
    <p>タイトル<input type="text" name="edit_todo" placeholder= "タイトル" maxlength="255" value="{{ $edit['todo'] }}" ></p>
    
    <!-- 内容-->
    @if(!empty($err_msg))
        @if ($err_msg->any())
            @foreach($err_msg->get('edit_comment') as $message)
                <p> {{ $message }} </p>
            @endforeach
        @endif
    @endif
    <p>内容<input type="text" name="edit_comment" placeholder= "内容" maxlength="255" value="{{ $edit['comment'] }}" ></p>

    <a href="/test_todo">[キャンセル]</a>

    <input type="button" class="btn btn-danger" name="delete" onclick="return edit_delete()" value="削除">
        削除

    <!-- <input type="submit" class="btn btn-danger" name="chkeck" onclick="return edit_check()" value="編集"> -->
    <input type="submit" class="btn btn-danger" name="chkeck" value="編集">
    
        編集
</form>
</div>

<!-- @endsection -->

</body>