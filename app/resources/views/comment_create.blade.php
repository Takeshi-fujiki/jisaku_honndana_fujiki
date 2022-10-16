@extends('layouts.app')
@section('content')

<form method="POST" action="{{ route('display.store') }}">
    @csrf
    <div class="container">
        <div class="panel panel-default">
            <h5 class="panel-heading">コメント投稿</h5>
            <div class="panel-body">
                <div class="form-group">
                <label class="control-label" name="date">投稿日</label>
                <input class="form-control" type="date" name="date">
                </div>

                <div class="form-group">
                <label class="control-label" name="good">本の評価</label>
                    <select name="good">
                        <option value="">--評価を選んでください--</option>
                        <option value="☆">☆</option>
                        <option value="☆☆">☆☆</option>
                        <option value="☆☆☆">☆☆☆</option>
                        <option value="☆☆☆☆">☆☆☆☆</option>
                        <option value="☆☆☆☆☆">☆☆☆☆☆</option>
                    </select>
                </div>

                <div class="form-group">
                <label class="control-label" name="comment">コメント</label>
                <textarea type="text" name="comment" class="form-control"></textarea>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary btn-lg">送信</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection