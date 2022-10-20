<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>New Status</title>
  </head>
  <body>
    <h1>新規情報入力欄</h1>
    <form action="{{ route('tsk_form', ['s_id' => $data->id]) }}" method="POST">
      @csrf
      <table border="1">
        <tr>
          <td>
            Status:
              <label><input type="radio" name="status" value="1ヶ月目">1ヶ月目</label>
              <label><input type="radio" name="status" value="2ヶ月目">2ヶ月目</label>
              <label><input type="radio" name="status" value="3ヶ月目">3ヶ月目</label>
              <label><input type="radio" name="status" value="OVER">OVER</label>
              <label><input type="radio" name="status" value="COMPLETE">COMPLETE</label>
          </td>
        </tr>
        <tr>
          <td>
            カリキュラム:<input type="text" name="le_name"/>
          </td>
        </tr>
        <tr>
          <td>
            進捗度合い:<input type="text" name="tsk_per"/>％
          </td>
        </tr>
        <!-- <tr>
          <td>
            メモ:
            <br />
            <textarea name="memo"cols="58" rows="6" maxlength="250" placeholder="250文字まで"></textarea>
          </td>
        </tr> -->
      </table>
      <br />
      <button type="submit">追加する</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </body>
</html>
