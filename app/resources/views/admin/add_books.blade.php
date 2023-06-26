@extends('layouts.admin_app')
@section('content')

<!-- <div class="col-md-6">
    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="panel panel-default">
                <h2 class="panel-heading gradation02">本の追加</h2>
                <div class="panel-body">

                    <div class="form-group">
                    <label class="control-label" name="name">本の名前</label>
                    <input class="form-control mb-3" type="" name="name">
                    </div>

                    <div class="form-group">
                    <label class="control-label" name="image">画像を添付:</label><br>
                    <input class="form-control mb-3" type="file" name="image">
                    </div>

                    <div class="form-group">
                    <label class="control-label" name="category">カテゴリ</label>
                    <select name="type_id" class="form-control mb-3">
                        <option value="" hidden></option>
                        @foreach($types as $type)
                        <option value=" {{ $type['id'] }} ">{{ $type['name'] }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                    <label class="control-label" name="author1">著者1</label>
                    <input class="form-control mb-3" type="" name="author1">
                    </div>

                    <div class="form-group">
                    <label class="control-label" name="author2">著者2</label>
                    <input class="form-control mb-3" type="" name="author2">
                    </div>

                    <div class="form-group">
                    <label class="control-label" name="author3">著者3</label>
                    <input class="form-control mb-3" type="" name="author3">
                    </div>
                    
                    <div class="form-group">
                        <button class="btn  btn-danger shadow btn-lg gradation02 shadow" onclick="history.back()">戻る</button>
                        <button type="submit" class="btn btn-danger shadow btn-lg gradation02">追加</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div> -->


<div class="d-flex justify-content-center">
<div class="col-md-6">
<form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="containers">
                <div class="head">
                    <h2>本の追加</h2>
                </div>
                <label class="control-label" name="name">本の名前</label><br />
                <input class="form-control" type="" name="name">
                <br>
                <label class="control-label" name="image">画像を添付:</label><br>
                <input class="form-control" type="file" name="image">
                <br>
                <br>
                <label class="control-label" name="category">カテゴリ</label>
                    <select name="type_id" class="form-control">
                        <option value="" hidden></option>
                        @foreach($types as $type)
                        <option value=" {{ $type['id'] }} ">{{ $type['name'] }}</option>
                        @endforeach
                    </select>
                <br>
                <br>
                <label class="control-label" name="author1">著者1</label>
                <input class="form-control" type="" name="author1">
                <br>
                <br>
                <label class="control-label" name="author2">著者2</label>
                <input class="form-control" type="" name="author2">
                <br>
                <br>
                <label class="control-label" name="author3">著者3</label>
                <input class="form-control" type="" name="author3">
                <br>
                <br>
                <button class="btn  btn-danger shadow btn-lg gradation02 shadow" onclick="history.back()">戻る</button>
                <button id="submit" type="submit">
                追加
                </button>
            </div>
            </form>
        </div>
        </div>

<br>
<br>
<br>
<br>
<br>
<br>

<style>
    .gradation02 {
    background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
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
@endsection