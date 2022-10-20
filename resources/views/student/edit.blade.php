<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>編集ページ</title>
  </head>
  <body>
    <h1>{{ $data->name }}さんの編集フォーム</h1>
    <form action="{{ route('edit_form', ['id' => $data->id])}}" method="POST">
      @csrf
      <table border="1">
        <tr>
          <td>
            名前:<input type="text" name="name" value="{{ old('name') ?? $data->name }}"/>
          </td>
        </tr>

        <tr>
          <td>
            年齢:<input type="text" name="age" value="{{ old('age') ?? $data->age }}"/>
          </td>
        </tr>
        <tr>
          <td>
            性別:
            <label><input type="radio" name="sex" value="M" {{$data->sex == 'M' ? 'checked': null }}>男性</label>
            <label><input type="radio" name="sex" value="W" {{$data->sex == 'W' ? 'checked': null }}>女性</label>
            <label><input type="radio" name="sex" value="X" {{$data->sex == 'X' ? 'checked': null }}>X</label>
          </td>
        </tr>

        <tr>
          <td>
            最寄り駅:<input type="text" name="address" value="{{ old('address') ?? $data->address }}"/>駅
          </td>
        </tr>
      </table>
      <br />
      <button type="submit">送信</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

  </body>
</html>
