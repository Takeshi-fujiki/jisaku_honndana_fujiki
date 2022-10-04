@extends('layouts.layout')
@section('content')
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
@endsection