@extends('layouts.app')

@section('content')

<!-- アラート表示に必要なjavascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    //新規todo 入力データチェック [追加]ボタン押された時に実行
    function todo_check(){
        //開始時間と終了時間が逆になっていれば
        if (newtodo_form.new_start_time.value > newtodo_form.new_ending_time.value){

            //alert("開始時間と終了時間の入力が間違っています");    //エラーメッセージを出力
            swal('開始時間と終了時間の入力が間違っています'); //sweetalert.js
            return false;    //追加ボタン無効

        //タイトルが入力されていなければ
        }else if( newtodo_form.new_todo.value == "" ){
            swal('タイトルが入力されていません'); //sweetalert.js
            return false;    //追加ボタン無効

        //入力データに問題がなければ
        }else{
            //開始時間と終了時間が正しい時
            return true;    //追加ボタン有効
        }
    }


</script>



<div style="text-align:center">
<div>todo新規登録</div>

<form method="POST" action="/todo_save" name="newtodo_form">
    @csrf
    <input type="hidden" name="new_user_id" value="{{ $new['user_id']}}"> <!-- user_id 表示させない -->
    <p>開始日時<input type="datetime-local" name="new_start_time" placeholder= "開始日時" value=<?=date('Y-m-d\TH:i', strtotime($new['start_time']))?> required></p>
    <p>終了日時<input type="datetime-local" name="new_ending_time" placeholder= "終了日時" value=<?=date('Y-m-d\TH:i', strtotime($new['ending_time']))?> required></p>
    <p>タイトル<input type="text" name="new_todo" placeholder= "タイトル" maxlength="255" value="{{ $new['todo'] }}" ></p>
    <p>内容<input type="text" name="new_comment" placeholder= "内容" maxlength="255" value="{{ $new['comment'] }}" ></p>

    <a href="/test_todo">キャンセル</a>

    <button type="submit" class="btn btn-danger" onclick="return todo_check()">
        <i class="fa fa-btn fa-trash"></i>追加
    </button>
</form>
</div>