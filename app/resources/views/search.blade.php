@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center">
    <div class="main-top text-center">
        <h2>本を探す</h2>
        <form action="{{ route('search.index') }}" method="GET">
            <input type="search" name="search"  placeholder="本を探す">
            <input type="submit" name="submit" value="検索">
        </form>
    </div>
</div>

<div class="d-flex justify-content-center">
    <h5 class="my-3 ml-3">検索結果</h5>
</div>
 
<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th>本の名前</th>
                 <th>著者</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @foreach($books as $book)
             <tr>
                 <td><a href="">{{ $book['name'] }}</a></td>
                 <td>{{ $book['author1'] }},{{ $book['author2'] }},{{ $book['author3'] }}</td>
                 <td><a href="">詳細</a>・<a href="{{ route('search.show',['search' => $book['id']]) }}">借りる</a></td>
            </tr>
            @endforeach       
         </tbody>
     </table>
 </div>
</div>
@endsection