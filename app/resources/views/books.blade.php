<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>books_detail</title>
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

    <div class="book-detail-img">
        <a><img src=""></a>
    </div>

    <div class="hyouka">本の評価</div>

    <div class="comment">本のコメント</div>

    <button type="button" class="back-button">戻る</button>

    <button type="button" class="rental">戻る</button>

</body>
