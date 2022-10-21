@extends('layouts.app')
@section('content')

<div class="box">
    @foreach($books as $book)
    <div class="d-flex justify-content-center">
        <ul>
            <li>
                {{ $book['name'] }}の返却日は<span class="text-danger">【{{ $book['date'] }}】</span>です
            </li>
        </ul>
    </div>
    @endforeach
</div>

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
    <h3 class="gradation01">自分の本棚</h3>
</div>

<!-- <div class="d-flex justify-content-center">

    <img src="" alt="本棚" width="300" height="500">

</div> -->

<div class="d-flex justify-content-center">
    <div class="mybooks">
        <div class="row">
            @foreach($books as $book)
            <div class="col-4">
                <div class="text-center">
                    <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="50" height="70" alt="mybook"></a>
                    <p><a href="{{ route('search.show',['search' => $book['id']]) }}" class="text-decoration-none">{{ $book['name'] }}</a></p>
                    <a href="{{ route('create_comment',['id' => $book['id']]) }}" class="text-decoretion-none">コメントする</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

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
