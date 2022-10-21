@extends('layouts.app')
@section('content')


<form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
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
                <label class="control-label" name="category">カテゴリ</label>
                <select name="type_id" class="form-control mb-3">
                    <option value="" hidden></option>
                    @foreach($types as $type)
                    <option value=" {{ $type['id'] }} ">{{ $type['name'] }}</option>
                    @endforeach
                </select>
                </div>

                <div class="form-group">
                <label class="control-label" name="author1">著者1</label>
                <input class="form-control mb-3" type="" name="author1">
                </div>

                <div class="form-group">
                <label class="control-label" name="author2">著者2</label>
                <input class="form-control mb-3" type="" name="author2">
                </div>

                <div class="form-group">
                <label class="control-label" name="author3">著者3</label>
                <input class="form-control mb-3" type="" name="author3">
                </div>
                
                <div class="form-group">
                    <button class="btn  btn-danger bg-gradient shadow btn-lg" onclick="history.back('/display')">戻る</button>
                    <button type="submit" class="btn btn-danger bg-gradient shadow btn-lg">追加</button>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection