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
    <h2 class="mb-5">管理者メニュー</h2>

    <a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ route('admin.show',['admin' => 1]) }}">本の貸し出し状況</a>
    <a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ url('admin_add_books') }}">本の追加</a>
    <a class="btn  btn-danger bg-gradient p-2 bd-highlight shadow mb-3" style="width:200px" href="{{ url('admin_users') }}">ユーザ管理</a>
</div>

@elsecan('user-higher')
<div class="d-flex justify-content-center">
    <div class="main-top text-center">
        <h2>本を探す</h2>
        <form action="{{ route('search.index') }}" method="GET">
            <input type="search" name="search"  placeholder="本を探す">
            <input type="submit" name="submit" value="検索">
        </form>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="book-janl">
        <div class="janl-img1">
            <a href=""><img src="" alt="html"></a>
        </div>
        <div class="janl-img2">
            <a href=""><img src="" alt="css"></a>
        </div>
        <div class="janl-img3">
            <a href=""><img src="" alt="java"></a>
        </div>
        <div class="janl-img4">
            <a href=""><img src="" alt="php"></a>
        </div>
        <div class="janl-img5">
            <a href=""><img src="" alt="laravel"></a>
        </div>
    </div>
</div>
@endcan
@endguest
@endsection