@extends('layouts.app')

@section('content')
<H1>ユーザー情報編集</H1>

<form method="POST" action="{{route('update',['id'=>$auth->id])}}" onSubmit="return check()">
  @csrf
  <div>
    <label for="Form-name">名前</label>
    <input type="text" name="name" id="form-name" value="{{$auth->name}}">
  </div>
  <div>
    <label for="Form-email">メールアドレス</label>
    <input type="text" name="email" id="form-email">
  </div>
  <button type="submit">編集</button>

  <script type="text/javascript"> 
  function check(){
  if(window.confirm('送信してよろしいですか？')){ 
  // 確認ダイアログを表示
  // 「OK」時は送信を実行
	return true;
	}
	else{ // 「キャンセル」時の処理
	window.alert('キャンセルされました'); // 警告ダイアログを表示
	return false; // 送信を中止
	}
}
</script>
  
@endsection
