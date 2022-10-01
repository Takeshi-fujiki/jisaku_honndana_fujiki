<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>top</title>
</head>
<body>

<header>
    <div class="header">
        <div class="top-img">
                <a href=" {{ url('/') }}"><img src="" alt="logo"></a>
        </div>
        <div class="header-menu">
            <ul>
                <li><a href="">マイページ</a></li>
                <li><a href="">HTML</a></li>
                <li><a href="">CSS</a></li>
                <li><a href="">Javascript</a></li>
                <li><a href="">php</a></li>
                <li><a href="">Laravel</a> </li>
            </ul>
        </div>
    </div>
</header>

<main>
    <div class="main-search">
        <form action="" method="">
            <div class="serch">
                <label for="search">本を探す</label><br>
                <input type="search" name="" placeholder="キーワードを入力">
            </div>
            <input type="submit" value="探す">
        </form>
    </div>

    <div class="main-books">
        <div class="book-img">
            <div class="left">
                <a href=""><img src="" alt="book-img"></a>
                <a href=""><img src="" alt="book-img"></a>
            </div>
            <div class="right">
                <a href=""><img src="" alt="book-img"></a>
                <a href=""><img src="" alt="book-img"></a>
            </div>
        </div>
    </div>
</main>

    
    
</body>
</html>