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
        <tr>
            <td>
                {{ $todo->updated_at }}
            </td>

            <td>
                <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post">
                    @csrf
                    <input type="text" name="content" value="{{ $todo->content }}">
                    <input type="submit" value="追加">

                    @error('content')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </form>
            </td>

            <td>
                <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                    @csrf
                    <input type="submit" value="削除">
                </form>
            </td>

            <td>

            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
