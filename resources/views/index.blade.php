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
        <input type="text" id="content" name="content">
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
        <tr>
            <th>

            </th>
            <th>

            </th>
        </tr>
    </table>

</body>
</html>
