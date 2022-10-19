@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('display.destroy',['display' => $comments['id']]) }}">
    @method('delete')
    @csrf

    
    <div class="container">
        <div class="panel panel-default">
            <h5 class="panel-heading">コメント削除</h5>
            <div class="panel-body">
                <div class="form-group">
                <label class="control-label" name="date">投稿日</label>
                <input class="form-control" type="date" name="date" value="{{ $comments['date'] }}">
                </div>

                <div class="form-group">
                <label class="control-label" name="comment">本の評価</label>
                    <select name="select">
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
                <textarea type="text" name="comment" class="form-control">{{ $comments['comment'] }}</textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary btn-lg">削除</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection