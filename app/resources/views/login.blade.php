<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>title</title>
</head>

<body>
    
    <h1>ログイン画面</h1>

    <p>ログイン</p>
    <form action="" method="">
        <p>メールアドレス</p>
        <label for="user_email"></label>
        <input type="text" name="email"><br>

        <p>パスワード</p>
        <label for="user_password"></label>
        <input type="text" name="password">

        <input type="submit" value="ログイン">
    </form>

</body>