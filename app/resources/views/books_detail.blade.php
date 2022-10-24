@extends('layouts.app')
@section('content')



@foreach($books as $book)
@if($book['lending'] == 0 )
<div class="d-flex justify-content-center mb-5">
    <div class="text-center">
        <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="book"></a>
        <h5>{{ $book['name'] }}</h5>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="col-5 ml-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>コメント</th>
                    <th>評価</th>
                    <th>ユーザ名</tn>
                    <th</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td></td>
                    <td>{{ $comment['comment'] }}</td>
                    <td>{{ $comment['good'] }}</td>
                    <td>{{ $comment['name'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
<button class="btn  btn-primary shadow btn-lg gradation02 shadow" onclick="history.back('/display')">戻る</button>
    <p>&nbsp</p>
    <p>&nbsp</p>
    <button type="submit" class="btn btn-primary shadow btn-lg gradation02">
        <a href="{{ route('search.show',['search' => $book['id']]) }}" class="text-decoration-none">
            借りる
        </a>
    </button>
</div>
@endif
@endforeach


@foreach($books as $book)
@if($book['lending'] == 1 )
<div class="d-flex justify-content-center mb-5">
    <div class="text-center">
        <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="book"></a>
        <h5>{{ $book['name'] }}</h5>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="col-5 ml-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>コメント</th>
                    <th>評価</th>
                    <th>ユーザ名</tn>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment['comment'] }}</td>
                    <td>{{ $comment['good'] }}</td>
                    <td>{{ $comment['name'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
<button class="btn  btn-primary shadow btn-lg gradation02 shadow" onclick="history.back('/display')">戻る</button>
</div>
@endif
@endforeach


<br>
<br>
<br>
<br>
<br>


<style>
    .gradation02 {
    background:linear-gradient(to right, #0000cd 0%, #00ffff 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
}
</style>
@endsection