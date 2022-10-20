<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Student_Data</title>
  </head>
  <h1>Student Data</h1>
  <body>
    <table border="1">
      <h2>{{ $student->name }}さんの詳細</h2>
      <tr>
        <th>
          名前
        </th>
        <th>
          年齢
        </th>
        <th>
          性別
        </th>
        <th>
          最寄り駅
        </th>
        <th>
          ステージ
        </th>
        <th>
          カリキュラム
        </th>
        <th>
          進捗
        </th>
        <th>
          作成日
        </th>
        <th>
          更新日
        </th>
        <th>
          編集・削除
        </th>
      </tr>
      <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $student->age }}歳</td>
        <td>{{ $student->sex }}</td>
        <td>{{ $student->address }}駅</td>
      </tr>
      @foreach($data as $s_data)
      <tr>
        <td>{{ $student->name }}</td>
        <td>{{ $s_data->age }}歳</td>
        <td>{{ $s_data->sex }}</td>
        <td>{{ $s_data->address }}駅</td>
        <td>{{ $s_data->status }}</td>
        <td>{{ $s_data->le_name }}</td>
        <td>{{ $s_data->tsk_per }}%</td>
        <td>{{ $s_data->created_at }}</td>
        <td>{{ $s_data->updated_at }}</td>
        <td>
          <a href="{{ route('tsk_edit', ['id' => $s_data->lesson_id]) }}">【編集】</a>
          <hr />
          <a href="{{ route('tsk_delete', ['id' => $s_data->lesson_id]) }}" onclick="return confirm('削除してよろしいですか？');">【詳細の削除】</a>
        </td>
      </tr>
      @endforeach
    </teble>
    <a href="{{ route('home') }}">【TOP】</a>
    <a href="{{ route('tsk_create', ['id' => $student->id]) }}">【新規追加】</a>
    <a href="{{ route('delete', ['id' => $student->id]) }}" onclick="return confirm('削除してよろしいですか？');">【データ削除】</a>
  </body>
</html>
