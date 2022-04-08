<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>TODOアプリ</h1>
        @error('content')
            <div class="error">{{ $message }}</div>
        @enderror
        <form action="create" method="post" class="addForm">
            @csrf
            {{-- <label for="content">TODO</label> --}}
            <input type="text" id="content" name="new_content" class="addInput" value = "{{ old('new_content') }}">
            <input type="submit" value="追加" class="addButton">
        </form>

        <table>
            <tr class="tableHeader">
                <th class="headerCreateDate">作成日</th>
                <th class="headerTaskName">タスク名</th>
                <th class="headerUpdate">更新</th>
                <th class="headerDelete">削除</th>
            </tr>

            @foreach($todos as $todo)
            <tr>
                <td class="itemCreateDate">
                    {{ $todo->updated_at }}
                </td>

                <td>
                    <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post">
                        @csrf
                        <input type="text" name="content" value="{{ $todo->content }}" class="updateInput">
                        <input type="submit" value="追加" class="updateButton">
                    </form>
                </td>

                <td>
                    <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
                        @csrf
                        <input type="submit" value="削除" class="deleteButton">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
