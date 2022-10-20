<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Completion Students List</title>
  </head>
  <body>
    <?php
    // var_dump($data->name);
    // exit;
     ?>
     <h1>卒業生一覧</h1>
     <table border="1">
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
           在籍一覧に戻す
         </th>
         <th>
           データ削除
         </th>
       </tr>
       @foreach($datas as $data)
       <tr>
         <td>
           {{ $data->name }}
         </td>
         <td>
           {{ $data->age }}
         </td>
         <td>
           {{ $data->sex }}
         </td>
         <td>
           {{ $data->address }}
         </td>
         <td>
           <a href="{{ route('redata', ['id' => $data->id]) }}">【戻す】</a>
         </td>
         <td>
           <a href="{{ route('erase', ['id' => $data->id]) }}" onclick="return confirm('削除してよろしいですか？');">【データ削除】</a>
         </td>
       </tr>
       @endforeach
     </teble>
     <a href="{{ route('home') }}">【TOP】</a>
  </body>
</html>
