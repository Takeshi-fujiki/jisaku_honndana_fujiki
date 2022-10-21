@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center mb-5 mt-5">
    <div class="main-top text-center">
        <h2 class="gradation01">本を探す</h2>
        <form method="get" action="{{ route('search.index') }}" class="search_container">
            <input type="text" name="search" size="25" placeholder="本を探す">
            <input type="submit" value="&#xf002" name="submit">
        </form>
    </div>
</div>

<div class="d-flex justify-content-center">
    <h5 class="my-3 ml-3 gradation01">検索結果</h5>
</div>
 
<div class="d-flex justify-content-center">
 <div class="col-5 ml-3">
     <table class="table table-striped table-hover">
         <thead>
             <tr>
                 <th></th>
                 <th>本の名前</th>
                 <th>著者</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
            @if($books == Null)
            <h5 class="d-flex justify-content-center text-danger">
                お探しの本は見つかりませんでした
            </h5>
            @else
                @foreach($books as $book)
                <tr>
                    <td><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="50" height="70"></td>
                    <td>{{ $book['name'] }}</td>
                    <td>{{ $book['author1'] }},{{ $book['author2'] }},{{ $book['author3'] }}</td>
<<<<<<< HEAD
                    <td><a href="{{ route('books_detail',['id' => $book['id']]) }}">詳細</a>
=======
                    <td><a href="">詳細</a>
>>>>>>> 5ddd6cb01b5791af95135c2b3c452ce3ea6b0dd3
                    /
                    <a href="{{ route('search.show',['search' => $book['id']]) }}">借りる</a></td>
                </tr>
                @endforeach       
            @endif
         </tbody>
     </table>
 </div>
</div>

<style>
    .search_container{
  box-sizing: border-box;
  position: relative;
  border: 1px solid #999;
  display: block;
  padding: 3px 10px;
  border-radius: 20px;
  height: 2.3em;
  width: 260px;
  overflow: hidden;
}
.search_container input[type="text"]{
  border: none;
  height: 2.0em;
}
.search_container input[type="text"]:focus {
  outline: 0;
}
.search_container input[type="submit"]{
  cursor: pointer;
  font-family: FontAwesome;
  font-size: 1.3em;
  border: none;
  background: none;
  color: #3879D9;
  position: absolute;
  width: 2.5em;
  height: 2.5em;
  right: 0;
  top: -10px;
  outline : none;
}
.gradation01 {
    background:linear-gradient(to right, #1b53d2 0%, #2fe2ff 100%);color: transparent;/*文字色を透明に*/
    -webkit-background-clip: text;/*chromeとSafari用、背景色を文字でクリップ*/
    display: inline-block;
}

.box {
    padding: 0.5em 1em;
    margin: 0 auto;
    font-weight: bold;
    color: black;
    background: #FFF;
    border: solid 3px #6091d3;
    border-radius: 10px;
    width:60%;
    
}

</style>
@endsection