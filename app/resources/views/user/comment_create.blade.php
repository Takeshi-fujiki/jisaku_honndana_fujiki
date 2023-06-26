@extends('layouts.app')
@section('content')

@foreach($books as $book)
<div class="container">

    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 text-center">
            <img class="" src="{{ asset('storage/images/'.$book['image_path']) }}" width="140" height="190">
            <h4 class="">{{ $book['name'] }}</h4>
            <p>著者：{{ $book['author1'] }},{{ $book['author2'] }},{{ $book['author3'] }}</p>
            
            <div class="p-3 border">詳細説明<br>TEXTTEXTTEXTTEXT</div>
        </div>
            
        <div class="col-md-6">
            <form id="contact" method="POST" action="{{ route('user.comment_show',['id' => $book['id']]) }}">
            @csrf
            <div class="containers">
                <div class="head">
                <h2>コメント投稿</h2>
                </div>
                <input type="date" name="date" placeholder="年/月/日" /><br />
                <br>
                <select name="good">
                    <option value="">--評価を選んでください--</option>
                    <option value="☆">☆</option>
                    <option value="☆☆">☆☆</option>
                    <option value="☆☆☆">☆☆☆</option>
                    <option value="☆☆☆☆">☆☆☆☆</option>
                    <option value="☆☆☆☆☆">☆☆☆☆☆</option>
                </select>
                <br>
                <br>
                <textarea type="text" name="comment" placeholder="コメントを入力"></textarea>
                <br>
                <br>
                <button id="submit" type="submit">
                コメントを投稿する
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>

@endforeach
@endsection



<style>
    .gradation02 {
    background:linear-gradient(to right, #0000cd 0%, #00ffff 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
    }

    .control-label {
        font-weight:bold
    }
    .img{
        margin-left: 20vw;
        margin-top: 20vh;
    }
    .img2{
        margin-left: 20.8vw;
        margin-top: 2vh;
    }


  .containers {
  width:80%;
  height: 60vh;
  /* margin:0 auto; */
  /* margin-left: 30vw; */
  text-align:center;
  -webkit-border-radius:6px;
  -moz-border-radius:6px;
  border-radius:6px;
  background-color:#FAFAFA;
  margin-top: 5vh;
}
.head {
  -webkit-border-radius:6px 6px 0px 0px;
  -moz-border-radius:6px 6px 0px 0px;
  border-radius:6px 6px 0px 0px;
  background-color:#2ABCA7;
  color:#FAFAFA;
}
h2 {
  text-align:center;
  padding:18px 0 18px 0;
  font-size: 1.4em;
}
input ,select{
  margin-bottom:10px;
}
textarea {
  height:100px;
  margin-bottom:10px;
}
input:first-of-type
{
  margin-top:35px;
}
input, textarea,select {
  font-size: 1em;
  padding: 15px 10px 10px;
  font-family: 'Source Sans Pro',arial,sans-serif;
  border: 1px solid #cecece;
  /* background: #d7d7d7; */
  color:black;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -moz-background-clip: padding;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  width: 80%;
  max-width: 600px;
}
::-webkit-input-placeholder {
   color: #FAFAFA;
}
:-moz-placeholder {
   color: #FAFAFA;  
}
::-moz-placeholder {
   color: #FAFAFA; 
}
:-ms-input-placeholder {  
   color: #FAFAFA;  
}
button {
  margin-top:15px;
  margin-bottom:25px;
  background-color:#2ABCA7;
  padding: 12px 45px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid #2ABCA7;
  -webkit-transition: .5s;
  transition: .5s;
  display: inline-block;
  cursor: pointer;
  width:60%;
  color:#fff;
}
button:hover, .button:hover {
  background:#19a08c;
}
label.error {
    font-family:'Source Sans Pro',arial,sans-serif;
    font-size:1em;
    display:block;
    padding-top:10px;
    padding-bottom:10px;
    background-color:#d89c9c;
    width: 80%;
    margin:auto;
    color: #FAFAFA;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border-radius:6px;
}
/* media queries */
@media (max-width: 700px) {
  label.error {
    width: 90%;
  }
  input, textarea {
    width: 90%;
  }
  button {
    width:90%;
  }
  body {
  padding-top:10px;
  }  
}
.message {
    font-family:'Source Sans Pro',arial,sans-serif;
    font-size:1.1em;
    display:none;
    padding-top:10px;
    padding-bottom:10px;
    background-color:#2ABCA7;
    width: 80%;
    margin:auto;
    color: #FAFAFA;
    -webkit-border-radius:6px;
    -moz-border-radius:6px;
    border-radius:6px;
}
</style>