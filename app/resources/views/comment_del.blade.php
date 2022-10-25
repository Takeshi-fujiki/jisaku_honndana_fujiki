@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('display.destroy',['display' => $comments['id']]) }}">
    @method('delete')
    @csrf

    
    <div class="container">
        <div class="panel panel-default">
            <h5 class="panel-heading gradation02 mb-5">コメント削除</h5>
            <div class="panel-body">
                <div class="form-group">
                <label class="control-label mb-3" name="date">投稿日</label>
                <input class="form-control mb-3" type="date" name="date" value="{{ $comments['date'] }}">
                </div>

                <div class="form-group">
                <label class="control-label mb-3" name="comment">本の評価</label>
                    <select name="good">
                        <option value="">{{ $comments['good'] }}</option>
                        <option value="1">☆</option>
                        <option value="2">☆☆</option>
                        <option value="3">☆☆☆</option>
                        <option value="4">☆☆☆☆</option>
                        <option value="5">☆☆☆☆☆</option>
                    </select>
                </div>

                <div class="form-group">
                <label class="control-label mb-3" name="comment">コメント</label>
                <textarea type="text" name="comment" class="form-control mb-5">{{ $comments['comment'] }}</textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary shadow btn-lg gradation02">削除</button>
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