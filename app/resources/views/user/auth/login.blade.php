@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow bg mt-3 login-bg">
                <div class="pt-3 mb-4 text-center mx-auto mt-3" style="width:150px; height:100px;">
                <img src="{{ asset('storage/images/book.jpg') }}" width="80" height="80">
                    <h3 class="gradation02">AcialLibrary</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-6 mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                        <div class="col-md-6 mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-2 text-center">
                            <button type="submit" class="btn btn-outline-primary btn-lg mb-2 mt-3">
                                <a href="" class="text-decoration-none">
                                {{ __('ログイン') }}
                                </a>
                            </button>
                            @if (Route::has('user.password.request'))
                            <div class="mx-auto text-center" style="width:250px">
                                <a class="btn text-decoration-none" href="{{ route('user.password.request') }}" id="id">
                                    パスワードを忘れた方はこちら
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<style>

.gradation02 {
background:linear-gradient(to right, #ff7f50 0%, #c71585 100%);color: transparent;
-webkit-background-clip: text;
display: inline-block;
font-weight:bold;
}
/* .container{
    width:75%;
} */
#id{
    font-size:12px;
}

body{
    background: linear-gradient(109.6deg, rgba(83, 223, 96, 1) 11.2%, rgba(188, 226, 195, 0.64) 91.1%);
}
body{
    height: 100vh;
    font-family: "Nunito", sans-serif;
    font-size: 0.9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
}

.row{
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}

html{
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
/* body { background:radial-gradient(#F89174, #FFC778); } */

.card-body{
    flex:1 1 auto;
    min-height:1px;
    padding: 1.25rem;
}

.col-form-label{
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: inherit;
    line-height: 1.6;
}
.text-md-right{
    text-align: right !important;
}

.mt-5{
    margin-top: 3rem !important;
}

</style>

@endsection
