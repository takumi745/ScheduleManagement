@extends('layouts.app')

@section('content')


<H1 class="text-center">ユーザー情報編集</H1>
<div class="d-flex justify-content-center">
<form method="POST" class="w-50 h-50" action="{{route('update',['id'=>$auth->id])}}" onSubmit="return check()">
  @csrf
  <div class="mb-3">
    <label for="Form-name">名前</label>
    <input type="text" class="form-control" name="name" id="form-name" value="{{$auth->name}}">
  </div>
   @if($errors->has('name'))
			@foreach($errors->get('name') as $message)
				{{ $message }}
			@endforeach
		@endif
  <div class="mb-3">
    <label for="Form-email">メールアドレス</label>
    <input type="text" class="form-control" name="email" id="form-email">
  </div>
  @if($errors->has('email'))
			@foreach($errors->get('email') as $message)
				{{ $message }}
			@endforeach
		@endif
  <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">編集</button></div>
</div>

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
