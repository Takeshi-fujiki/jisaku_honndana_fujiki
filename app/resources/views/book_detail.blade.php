<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>本のジャンル別本棚</title>
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
        <div class="book-janl">
            <h1>HTML</h1>
        </div>

        <div class="hondana">
            <img src="../../image/hondana.jpg" alt="hondana">
        </div>

        <div class="books-detail">
            <div class="books-detail-img">
                <div class="detail1">
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                </div>
                <div class="detail2">
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                </div>
                <div class="detail3">
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                </div>
                <div class="detail4">
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                    <a href=""><img src="" alt="book-img"></a>
                </div>
            </div>
        </div>

    </main>

</body>

