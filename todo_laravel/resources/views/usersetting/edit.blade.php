@extends('layouts.app')

@section('content')
<H1>ユーザー情報編集</H1>
<form metohd="POST" action="">
  @csrf
  <div>
    <label for="Form-name"></label>
    <input type="text" name="name" id="form-name">
  </div>
  <div>
    <label for="Form-email"></label>
    <input type="text" name="name" id="form-email">
  </div>
  <div>
    <label for="Form-name"></label>
    <input type="text" name="name" id="form-name">
  </div>
  <button type="submit">編集</button>
@endsection
