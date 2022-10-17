@extends('layouts.app')
@section('content')


<form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-date">
    @csrf
    <div class="container">
        <div class="panel panel-default">
            <h3 class="panel-heading">本の追加</h3>
            <div class="panel-body">

                <div class="form-group">
                <label class="control-label" name="name">本の名前</label>
                <input class="form-control mb-3" type="" name="name">
                </div>

                <div class="form-group">
                <label class="control-label" name="image">画像を添付:</label><br>
                <input class="form-control mb-3" type="file" name="image">
                </div>

                <div class="form-group">
                <label class="control-label" name="category">分類</label>
                <input class="form-control mb-3" type="" name="category">
                </div>

                <div class="form-group">
                <label class="control-label" name="author">著者1</label>
                <input class="form-control mb-3" type="" name="author">
                </div>

                <div class="form-group">
                <label class="control-label" name="author">著者2</label>
                <input class="form-control mb-3" type="" name="author">
                </div>

                <div class="form-group">
                <label class="control-label" name="author">著者3</label>
                <input class="form-control mb-3" type="" name="author">
                </div>
                
                <div class="form-group">
                    <button class="btn  btn-danger bg-gradient shadow btn-lg" onclick="history.back('/display')">戻る</button>
                    <button class="btn btn-danger bg-gradient shadow btn-lg">追加</button>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection