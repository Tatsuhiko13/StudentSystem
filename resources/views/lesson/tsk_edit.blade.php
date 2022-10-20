<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Status Edit</title>
  </head>
  <body>

    <h1>{{ $data->name }}さんの編集フォーム</h1>
    <form action="{{ route('tsk_update', ['l_id' => $lesson->id] )}}" method="POST">
      @csrf
      <table border="1">
        <tr>
          <td>
            Status:
              <label><input type="radio" name="status" value="1ヶ月目" {{$lesson->status == '1ヶ月目' ? 'checked': null }}>1ヶ月目</label>
              <label><input type="radio" name="status" value="2ヶ月目" {{$lesson->status == '2ヶ月目' ? 'checked': null }}>2ヶ月目</label>
              <label><input type="radio" name="status" value="3ヶ月目" {{$lesson->status == '3ヶ月目' ? 'checked': null }}>3ヶ月目</label>
              <label><input type="radio" name="status" value="OVER" {{$lesson->status == 'OVER' ? 'checked': null }}>OVER</label>
              <label><input type="radio" name="status" value="COMPLETE" {{$lesson->status == 'COMPLETE' ? 'checked': null }}>COMPLETE</label>
          </td>
        </tr>
        <tr>
          <td>
            カリキュラム:<input type="text" name="le_name" value="{{ old('le_name') ?? $lesson->le_name }}"/>
          </td>
        </tr>
        <tr>
          <td>
            進捗度合い:<input type="text" name="tsk_per" value="{{ old('tsk_per') ?? $lesson->tsk_per }}"/>％
          </td>
        </tr>

      </table>
      <br />
      <button type="submit">送信</button>
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
