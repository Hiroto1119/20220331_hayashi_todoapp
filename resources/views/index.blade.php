<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>TODOアプリ</h1>

    <form action="create" method="post">
        @csrf
        <label for="content">TODO</label>
        <input type="text" id="content" name="content" value="{{ old('content') }}">
        <input type="submit" value="追加">
        @error('content')
            <div class="error">{{ $message }}</div>
        @enderror
    </form>

    <table>
        <tr>
            <th>作成日</th>
            <th>タスク名</th>
        </tr>

        @foreach($todos as $todo)
        <form action="update" method="post">
        @csrf
            <tr>
                <td>{{ $todo->updated_at }}</td>
                <td><input type="text" placeholder="{{ $todo->content }}"></td>
                <td>
                    <input type="submit" value="変更">
                    {{-- <a href="{{ route('/update') }}">変更</a> --}}
                    {{-- ↑
                    ここがエラー --}}
                    {{-- <a href="{{ route('/update', ['id' => $todo->id]) }}">変更</a>
                    <a href="{{ route('/delete', ['id' => $todo->id]) }}">削除</a> --}}
                </td>
            </tr>
        </form>

        @endforeach

        {{-- <tr>
            <td>
                {{ $todos }}
                DBから作成時間を表示
            </td>
            <td>
                <input type="text" name="taskName" value="{{ $todos->content }}">
                <form action="update" method="post">
                    <input type="text" name="taskName">
                    <input type="submit" value="更新">
                </form>

                <input type="submit" value="削除">
            </td>
        </tr> --}}
    </table>
    </form>
    {{-- @foreach ($todos as $todo)
        <p>{{ $todo->content }}</p>

    @endforeach --}}

</body>
</html>
