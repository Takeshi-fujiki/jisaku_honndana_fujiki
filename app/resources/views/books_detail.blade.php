@extends('layouts.app')
@section('content')

@foreach($books as $book)
<div class="d-flex justify-content-center">
    <div class="text-center">
        <a href=""><img src="" width="150" height="230" alt="book"></a>
        <h5>{{ $book['name'] }}</h5>
    </div>
</div>
@endforeach

<div class="d-flex justify-content-center">
    <div class="col-5 ml-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>コメント</th>
                    <th>評価</th>
                    <th>ユーザ名</tn>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                @foreach($comments as $comment)
                @foreach($users as $user)
                <tr>
                    <td><img src="" width="150" height="230" alt="book"></td>
                    <td>{{ $comment['comment'] }}</td>
                    <td>{{ $comment['good'] }}</td>
                    <td>{{ $user['name'] }}</td>
                </tr>
                @endforeach
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach($books as $book)
<div class="button">
    <a href="" onclick="history.back()">戻る</a>
    <a href="{{ route('search.show',['search' => $book['id']]) }}" >借りる</a>
</div>
@endforeach

@endsection