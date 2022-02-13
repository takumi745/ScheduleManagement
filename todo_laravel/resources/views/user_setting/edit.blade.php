@extends('layouts.app')

@section('content')
<H1>ユーザー情報編集</H1>

<form method="POST" action="{{route('update',['id'=>$auth->id])}}">
  @csrf
  <div>
    <label for="Form-name">名前</label>
    <input type="text" name="name" id="form-name" value="{{$auth->name}}">
  </div>
  <div>
    <label for="Form-email">メールアドレス</label>
    <input type="text" name="name" id="form-email">
  </div>
  <div>
    <label for="Form-name"></label>
    <input type="text" name="name" id="form-name">
  </div>
  <button type="submit">編集</button>
@endsection
