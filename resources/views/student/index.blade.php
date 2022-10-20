<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel = "stylesheet" href = "{{ asset('css/style.css') }}">
  </head>
  <body>
    <h1 class="head">生徒在籍一覧</h1>
    <ul>
       <li class="list1"><a href="{{ route('create') }}">生徒追加登録</a></li>
       <li class="list2"><a href="{{ route('comp') }}">削除一覧</a></li>
    </ul>
    <table border="1">
      <tr>
        <th>
          名前
        </th>
        <th>
          DATA
        </th>
        <th>
          削除
        </th>
      </tr>
      @foreach($datas as $data)
      <tr>
        <td>
          {{ $data->name }}
        </td>
        <td>
          <a href="{{ route('tsk', ['id' => $data->id]) }}">詳細</a>
        </td>
        <td>
          <a href="{{ route('edit', ['id' => $data->id]) }}">編集</a>
          <hr />
          <a href="{{ route('delete', ['id' => $data->id]) }}" onclick="return confirm('削除してよろしいですか？');">【削除】</a>
        </td>
      </tr>
      @endforeach
    </teble>


  </body>
</html>
