@extends('layouts.test_todo_index')
@section('calendar_area')
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>todoテスト用ページ</div>
    <div>todo新規</div>
    <form action="/todo_new" method="POST">
        @csrf
        <lavel>user id:<input type="text" name="login_user_id" ></lavel>
        <lavel>date:<input type="date" name="date"></lavel>
        <input type="submit" value="新規">
    </form>

    <div>選択日時一覧</div>
    <form action="/todo_list" method="POST">
        @csrf
        <lavel>user id:<input type="text" name="login_user_id"></lavel>
        <lavel>date:<input type="date" name="date"></lavel>
        <input type="submit" value="一覧">
    </form>
</body>
</html>
@endsection
