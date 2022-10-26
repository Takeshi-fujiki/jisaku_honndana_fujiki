@extends('layouts.app')
@section('content')

@guest
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        パスワードを忘れた方はこちら
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
@can('system-only')
@elsecan('admin-higher')
<div class="d-flex align-items-center flex-column">
    <h2 class="mb-5 gradation02">管理者メニュー</h2>

    <a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-5" style="width:200px" href="{{ route('admin.show',['admin' => 1]) }}">本の貸し出し状況</a>
    <a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-5" style="width:200px" href="{{ url('admin_add_books') }}">本の追加</a>
    <a class="btn  btn-danger shadow btn-lg gradation02 shadow mb-5" style="width:200px" href="{{ url('admin_users') }}">ユーザ管理</a>
</div>

<style>
    .gradation02 {
    background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
    -webkit-background-clip: text;
    display: inline-block;
    font-weight:bold;
}
</style>

@elsecan('user-higher')


<div class="d-flex justify-content-center mb-5 mt-5">
    <div class="main-top text-center">
        <h2 class="gradation01">本を探す</h2>

        <form method="get" action="{{ route('search.index') }}" class="search_container">
            <input type="text" name="search" size="25" placeholder="本を探す">
            <input type="submit" value="&#xf002" name="submit">
        </form>
    </div>
</div>
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
            <a href="{{ route('search.index') }}"><img src="{{ asset('storage/images/html.png') }}" ></a>
        </div>
        <div class="img2">
            <a href="{{ route('search.index') }}"><img src="{{ asset('storage/images/css.png') }}" ></a>
        </div>
        <div class="img3">
            <a href="{{ route('search.index') }}"><img src="{{ asset('storage/images/java.png') }}" ></a>
        </div>
        <div class="img4">
            <a href="{{ route('search.index') }}"> <img src="{{ asset('storage/images/php.png') }}" ></a>
        </div>
        <div class="img5">
            <a href="{{ route('search.index') }}"><img src="{{ asset('storage/images/laravel.png') }}" ></a>
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
        width:220px;
        height:80px
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
@endcan
@endguest
@endsection