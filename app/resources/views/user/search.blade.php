@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center mb-5 mt-5">
    <div class="main-top text-center">
        <h2 class="gradation01">本を探す</h2>
        <form method="get" action="{{ route('user.search.index') }}" class="search_container">
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

            @foreach($books as $b)

                <div class="rental" data-rtl="{{ $b['id'] }}">
                    <tr>
                        <td><img src="{{ asset('storage/images/'.$b['image_path']) }}" width="50" height="70"></td>
                        <td>{{ $b['name'] }}</td>
                        <td>{{ $b['author1'] }},{{ $b['author2'] }},{{ $b['author3'] }}</td>
                        <td><a href="{{ route('user.books_detail',['id' => $b['id']]) }}" class="text-decoration-none">詳細</a>
                        /
                        <div class="rtl">
                            <div class="rtl2">
                                <a href="" class="text-decoration-none" data-book="{{ $b['id'] }}">借りる</a>
                            </div>

                            <div class="modal-rental" data-book1="{{ $b['id'] }}">
                                <div class="d-flex justify-content-center mb-5">
                                    <h4 class="gradation02">こちらの本を借りますか？</h4>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="text-center">
                                        <a href=""><img src="{{ asset('storage/images/'.$b['image_path']) }}" width="150" height="230" alt="mybook"></a>
                                        <h5>{{ $b['name'] }}</h5>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="d-flex justify-content-center">
                                        <div class="back2">
                                            <a href="" class="btn btn-outline-primary">
                                                戻る
                                            </a>
                                        </div>
                                        <div class="rental2" data-rental ="{{ $b['id'] }}">
                                            <a href="" id="rental" class="btn btn-outline-primary rental">
                                                借りる
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-rental2">
                                <div class="d-flex justify-content-center mb-3">
                                    <h4 class="gradation02">ありがとうございました☆</h4>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="mybooks1 text-center">
                                        <a href=""><img src="{{ asset('storage/images/'.$b['image_path']) }}" width="150" height="230" alt="mybook"></a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mb-3">
                                    <p>【{{ $b['name'] }}】</p>
                                    <p>を借りました</p>
                                </div>
                                <div class="d-flex justify-content-center text-danger mb-3">
                                    <h5>返却期限は</h5>
                                    <h5>【{{ $week }}】です。</h5>
                                </div>
                                <buuton onclick="window.location.reload()">
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-outline-primary" id="top">
                                            TOPへ戻る
                                        </a>
                                    </div>
                                </button>
                            </div>

                        </div>
                        </td>
                    </tr>
                </div>
      
                @endforeach
                @endif
            </tbody>
        </table>
 </div>
</div>

<script>

    document.addEventListener('DOMCContentLoaded',function() {
        document.getElementById("top").addEventListener("click",function() {
            window.location.reload();
        })
    });

</script>




<div class="overlay"></div>

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
    padding: 0.5em 1em;
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

.modal-rental {
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

.modal-rental2{
    display:none;
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:430px;
    height:500px;
    background-color:white;
    z-index:11;
    padding-top: 35px;
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
.back2 a{
    margin-right: 0.5em;
}


</style>
@endsection