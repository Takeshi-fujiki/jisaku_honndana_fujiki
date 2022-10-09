@extends('layouts.layout')
@section('content')
<div class="main-top">
    <h2>本を探す</h2>
    <form action="" method="">
    <input type="search" name="search" placeholder="本を探す">
    <input type="submit" name="submit" value="検索">
</form>
</div>

<div class="book-janl">
    <div class="janl-img1">
        <a href=""><img src="" alt="html"></a>
    </div>
    <div class="janl-img2">
        <a href=""><img src="" alt="css"></a>
    </div>
    <div class="janl-img3">
        <a href=""><img src="" alt="java"></a>
    </div>
    <div class="janl-img4">
        <a href=""><img src="" alt="php"></a>
    </div>
    <div class="janl-img5">
        <a href=""><img src="" alt="laravel"></a>
    </div>
</div>

@endsection