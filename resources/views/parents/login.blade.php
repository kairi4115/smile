<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>保護者用ログイン</title>
</head>
<body>
    <h1>保護者ログイン</h1>
    <form action="{{ route('parents.top') }}" method="post">
        <label for="username">ユーザー名:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">パスワード:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="ログイン">
    </form>
    <p>新規登録は<a href="{{ url('parents/register') }}">こちら</a></p>
</body>
</html>
