@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center mb-5">
    <div class="main-top text-center">
        <h2>本を探す</h2>
        <form action="{{ route('search.index') }}" method="GET">
            <input type="search" name="search"  placeholder="本を探す">
            <input type="submit" name="submit" value="検索">
        </form>
    </div>
</div>


<div class="d-flex justify-content-center">
    <h3>自分の本棚</h3>
</div>

<div class="d-flex justify-content-center">
<div class="mybooks">
    <div class="mybooks1">
        @foreach($books as $book)
        <a href=""><img src="" alt="mybook"></a>
        <p><a href="{{ route('search.update',['search' => $book['id']]) }}">{{ $book['name'] }}</a></p>
        @endforeach
    </div>
    
</div>
</div>

<a href="{{ route('display.create') }}">コメント投稿</a>

<h5 class="d-flex justify-content-center">{{ Auth::user()->name }}さんのコメント一覧</h5>

<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>コメント</th>
                 <th>評価</th>
             </tr>
         </thead>
         <tbody>
            @foreach($comments as $comment)
             <tr>
                 <td>{{ $comment['comment'] }}</td>
                 <td>{{ $comment['good'] }}</td>
                 <td>
                    <a href="{{ route('display.edit',['display' => $comment['id']],'edit') }}">編集</a>
                    <a href="{{ route('display.destroy',['display' => $comment['id']]) }}">削除</a>
                    </form>
                </td>
            </tr>
            @endforeach       
         </tbody>
     </table>
 </div>
</div>

@endsection
