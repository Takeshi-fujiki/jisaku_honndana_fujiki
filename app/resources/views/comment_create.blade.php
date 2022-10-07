@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('display.store') }}">
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
        <textarea type="text" name="comment" class="form-control"></textarea><br>

        <button type="submit">投稿</button>
        <!-- <a href="{{ route('display.show',['display' => Auth::user()->id]) }}">投稿</a> -->
    </div>
</form>

@endsection