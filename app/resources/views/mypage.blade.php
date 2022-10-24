
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

<div class="d-flex justify-content-center">
    @foreach($books as $book)
    <div class="mybooks" data-book="{{ $book['id'] }}">
        <div class="row mb-5">
                <div class="col-4">
                    <div class="text-center mb-3">
                        <a href="" class="mb-3">
                            <img src="{{ asset('storage/images/'.$book['image_path']) }}" width="50" height="70" alt="mybook">
                        </a>
                        <br>
                        <a href="" id="name" class="text-decoration-none mb-3">
                            {{ $book['name'] }}
                        </a>
                        <br>
                    </div>
                 </div>

                 <div class="modal-window">
            <div class="d-flex justify-content-center mb-3">
                <h4 class="gradation02">こちらの本を返却しますか？</h4>
            </div>
            <div class="d-flex justify-content-center">
                <div class="mybooks1 text-center ">
                    <a href="" data-id ="{{ $book['id'] }}">
                        <img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="mybook">
                    </a>
                    <h5>{{ $book['name'] }}</h5>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('create_comment',['id' => $book['id']]) }}" class="btn btn-primary shadow gradation01 text-decoration-none">
                    コメントする
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <a href="" id=back class="btn btn-primary shadow btn-lg gradation02">
                    戻る
                </a>
                <a href="" id="return" data-return ="{{ $book['id'] }}" class="btn btn-primary shadow btn-lg gradation02">
                    返却
                </a>
            </div>
        </div>

        <div class="modal-window2">
    <div class="d-flex justify-content-center mb-5">
        <h4 class="gradation02">ありがとうございました☆</h4>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <div class="mybooks1 text-center">
            <a href=""><img src="{{ asset('storage/images/'.$book['image_path']) }}" width="150" height="230" alt="mybook"></a>
        </div>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <p>【{{ $book['name'] }}】</p>
        <p>を返却しました</p>
    </div>
    <div class="d-flex justify-content-center">
        <a href="{{ url('/display') }}" class="btn btn-primary shadow btn-lg gradation02" id="top">
            TOPへ戻る
        </a>
    </div>
</div>

    </div>
</div>
@endforeach
</div>




<div class="overlay"></div>


<script>

$(function() {
    $('#top').on('click',function() {
        $.ajax({
            type:'get';
            url:'',
            dataType:'',
            succsess:function(data) {
                $("").append(data);
                comsole.log('Ok');
            },
            error:function() {
                console.log('No');
            }
        })
    })
})

</script>
   
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
    background:linear-gradient(to right, #1b53d2 0%, #2fe2ff 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
}

.box {
    padding: 1em 1em 0.5em 1em;
    margin: 0 auto;
    font-weight: bold;
    color: black;
    background: #FFF;
    border: solid 3px #6091d3;
    border-radius: 10px;
    width:60%;
    
}

.gradation02 {
        background:linear-gradient(to right, #0000cd 0%, #00ffff 100%);color: transparent;
        -webkit-background-clip: text;
        display: inline-block;
        font-weight:bold;
}

.modal-window{
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:430px;
    height:500px;
    background-color:white;
    z-index:11;
    padding-top: 50px;
    border-radius:3%;
}
.modal-window2{
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:430px;
    height:500px;
    background-color:white;
    z-index:11;
    padding-top: 45px;
    border-radius:3%;
}

.overlay{
    display:none;
    position:fixed;
    top:0;
    left:0;
    background-color: rgba(0,0,0,0.5);
    width:100%;
    height:100%;
    z-index:10;
}
#back{
    margin-right: 0.5em;
}

.row{
    width:60%;
    margin: 0 auto;
}



#name{
    color:black;
}

</style>

@endsection



