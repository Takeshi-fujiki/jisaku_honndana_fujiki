@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('display.update',['display' => $id]) }}">
    @method('patch')
    @csrf

    <div class="container">
        <div class="panel panel-default">
            @foreach($books as $book)
            <img src="{{ asset('storage/images/'.$book['image_path']) }}" width="65" height="80">
            @endforeach
            <h5 class="panel-heading gradation02 mb-5">コメント編集</h5>
            <div class="panel-body">
                <div class="form-group">
                <label class="control-label mb-3" name="date">投稿日</label>
                <input class="form-control mb-3" type="date" name="date" value="{{ $comment['date'] }}">
                </div>

                <div class="form-group">
                <label class="control-label mb-3" name="good">本の評価</label>
                    <select name="good">
                        <option value="">{{ $comment['good'] }}</option>
                        <option value="☆">☆</option>
                        <option value="☆☆">☆☆</option>
                        <option value="☆☆☆">☆☆☆</option>
                        <option value="☆☆☆☆">☆☆☆☆</option>
                        <option value="☆☆☆☆☆">☆☆☆☆☆</option>
                    </select>
                </div>

                <div class="form-group">
                <label class="control-label mb-3" name="comment">コメント</label>
                <textarea type="text" name="comment" class="form-control mb-5">{{ $comment['comment'] }}</textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary shadow btn-lg gradation02">編集</button>
                </div>
            </div>
        </div>
    </div>
</form>


<style>
    .gradation02 {
    background:linear-gradient(to right, #0000cd 0%, #00ffff 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
    }

    .control-label {
        font-weight:bold
    }
</style>
@endsection