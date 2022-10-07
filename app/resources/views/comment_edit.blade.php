@extends('layouts.app')
@section('content')

<h2>コメント編集・削除</h2>
<form method="POST" action="{{ route('display.update',['display' => $id]) }}">
    @method('patch')
    @csrf
    <!-- <div class="star">
    <label for="" class="">評価</label>
    <select name="select">
        <option value="">--評価を選んでください--</option>
        <option value="1">☆</option>
        <option value="2">☆☆</option>
        <option value="3">☆☆☆</option>
        <option value="4">☆☆☆☆</option>
        <option value="5">☆☆☆☆☆</option>
    <br>
    </div> -->

    <div class="comment">
        <label for="" class="" name="date">投稿日</label><br>
        <input type="date" name="date"><br>

        <label for="" class="" name="comment">コメント</label><br>
        <textarea type="text" name="comment" value="" class="form-control"></textarea><br>
        
        <button type="submit">編集</button>
        <button type="submit">削除</button>

        <!-- <a href="{{ route('display.show',['display' => Auth::user()->id]) }}">投稿</a> -->
    </div>
</form>

@endsection