@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center border rounded-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center gradation02"><h4>ログイン</h4></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right gradation02 mb-3">メールアドレス</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right gradation02 mb-3">パスワード</label>

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

                                    <label class="form-check-label mb-3" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn shadow gradation02">
                                    <a href="" class="text-decoration-none gradation02">
                                    {{ __('Login') }}
                                    </a>
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link shadow gradation02" href="{{ route('password.request') }}" id="id">
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


<!-- <div id="form">
      <p class="form-title">Login</p>
      <form action="post">
        <p>Email</p>
        <p class="mail">
          <input type="email" name="mail" />
        </p>
        <p>Password</p>
        <p class="pass">
          <input type="password" name="pass" />
        </p>
        <p class="check">
          <input type="checkbox" name="checkbox" />パスワードを保存
        </p>
        <p class="submit">
          <input type="submit" value="Login" />
        </p>
      </form>
</div>
<div class="back"></div> -->


<style>

.gradation02 {
background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
-webkit-background-clip: text;
display: inline-block;
font-weight:bold;
}
.container{
    width:75%;
}
#id{
    font-size:12px;
}

/* body { background:radial-gradient(#F89174, #FFC778); } */
</style>

@endsection
