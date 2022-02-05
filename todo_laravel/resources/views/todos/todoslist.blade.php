<!-- @extends('layouts.test_todo_index') -->
<!-- @include('todos.test_todo') -->
<!-- @section('todo_list_area') -->
 
<!-- タスク一覧表示 -->




<div>   <!-- class="panel panel-default"> -->

    <div> <!-- class="panel-body"> -->
        <!-- <table class="table table-striped task-table" > -->
        <table border="1" >

            <!-- テーブルヘッダ -->
            <thead>
                <th style="width:15%" >開始日時</th>
                <th style="width:15%" >終了日時</th>
                <th style="width:30%" >タイトル</th>
                <th style="width:30%" >内容</th>
                <th style="width:10%" ></th>
            </thead>
 
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($list_todos as $todo)
                <tr>
                    <!-- 名前 -->
                    <!-- <td class="table-text"> -->
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
                        <!-- TODO: 削除ボタン -->
                        
                        <div style="text-align:center" >
                            <a href="{{ url('/todo_edit/'.$todo->id) }}">編集</a>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- @endsection -->

