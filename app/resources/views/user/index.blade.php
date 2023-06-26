@extends('layouts.app')
@section('content')

<select name="good">
@foreach($b as $c)
<option value="">{{$c}}</option>
@endforeach
</select>



<div class="d-flex justify-content-center mb-5 mt-5">
    <div class="main-top text-center">
        <h2 class="gradation01">本を探す</h2>

        <form method="get" action="">
            <input type="text" name="search" size="25" placeholder="" value="@if (isset($search)) {{ $search }} @endif">
            <input type="submit" value="&#xf002" name="submit">
        </form>
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

</style>

<div class="d-flex justify-content-center">
    <div class="book-janl">
        <div class="img1">
            <a href="{{ route('user.search.index') }}"><img src="{{ asset('storage/images/html.png') }}" ></a>
        </div>
        <div class="img2">
            <a href="{{ route('user.search.index') }}"><img src="{{ asset('storage/images/css.png') }}" ></a>
        </div>
        <div class="img3">
            <a href="{{ route('user.search.index') }}"><img src="{{ asset('storage/images/java.png') }}" ></a>
        </div>
        <div class="img4">
            <a href="{{ route('user.search.index') }}"> <img src="{{ asset('storage/images/php.png') }}" ></a>
        </div>
        <div class="img5">
            <a href="{{ route('user.search.index') }}"><img src="{{ asset('storage/images/laravel.png') }}" ></a>
        </div>
    </div>
</div>

<style>

    .img1 img{
        width:150px;
    }
    .img2 img{
        width:130px;
    }
    .img3 img{
        width:150px;
    }
    .img4 img{
        width:160px;
    }
    .img5 img{
        width:250px;
        height:150px
    }
    .img1{
        position: absolute;
        top:45%;
        left:10%;
    }
    .img2{
        position: absolute;
        top:70%;
        left:25%;
    }
    .img3{
        position: absolute;
        top:45%;
        left:44%;
    }
    .img4{
        position: absolute;
        top:80%;
        left:60%;
    }
    .img5{
        position: absolute;
        top:50%;
        left:70%;
    }

</style>
@endsection