@extends('layouts.layout')
@section('content')

<div class="mypage">
    <h2>自分の本棚</h2>
</div>

<div class="mybooks">
    <div class="mybooks1">
        <a href=""><img src="" alt="1"></a>
    </div>
    <div class="mybooks2">
        <a href=""><img src="" alt="2"></a>
    </div>
    <div class="mybooks3">
        <a href=""><img src="" alt="3"></a>
    </div>
    <div class="mybooks4">
        <a href=""><img src="" alt="4"></a>
    </div>
    <div class="mybooks5">
        <a href=""><img src="" alt="5"></a>
    </div>
    <div class="mybooks6">
        <a href=""><img src="" alt="6"></a>
    </div>
</div>

<a href="{{ route('display.create') }}">コメント投稿</a>
<p>{{ Auth::user()->name }}さんのコメント一覧</p>

@foreach($comments as $comment)
<p>#:{{ $comment['comment'] }}
    <a href="{{ route('display.edit',['display' => $comment['id']],'edit') }}">編集</a>
    <a href="{{ route('display.destroy',['display' => $comment['id']]) }}">削除</a><br>
</p>
@endforeach

@endsection
