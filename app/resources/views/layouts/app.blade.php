<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AcialLibrary</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Scripts bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js” integrity=“sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin=“anonymous”>

    <script src=“https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js”></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/books.js') }}" defer></script>

    </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light bg-gradient shadow">
            <div class="container">
                <div class="image">
                    <img src="{{ asset('storage/images/book_logo.jpg') }}" width="50" height="60">
                </div>
                <a class="navbar-brand rogo" href="{{ url('/') }}">
                AcialLibrary
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    新規登録 <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Route::has('register'))
                                    <a class="nav-link dropdown-item" href="{{ route('register') }}">ユーザ新規登録</a>
                                    @endif
                                    <a class="nav-link dropdown-item" href="{{ url('admin_register') }}">管理者新規登録</a>
                                    <a class="nav-link dropdown-item" href="{{ url('system_register') }}">開発者新規登録</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}さんでログイン中 <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('system-only')
                                @elsecan('admin-higher')
                                <a class="dropdown-item" href="{{ route('display.show',['display' => Auth::id() ]) }}">マイページ</a>
                                <a class="dropdown-item" href="{{ route('user.edit',['user' => Auth::id()],'edit') }}">アカウント情報変更</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                                @elsecan('user-higher')
                                <a class="dropdown-item" href="{{ route('display.show',['display' => Auth::id() ]) }}">マイページ</a>
                                <a class="dropdown-item" href="{{ route('user.edit',['user' => Auth::id()],'edit') }}">アカウント情報変更</a>
                                <a class="dropdown-item" href="{{ route('display.index') }}">過去のコメント一覧</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                                @endcan
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        </main>
    </div>

    <style>
        .rogo {
            display: inline-block;
            background: linear-gradient(90deg, #4158D0, #C850C0 30%, #FFCC70);
            background: -webkit-linear-gradient(0deg, #4158D0, #C850C0 30%, #FFCC70);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size:25px;
            padding: 0.3em 0.7em;
            margin-bottom: 0.2em;
            position: relative;
        }
        .image{
            position: absolute;
            left:50px;

        }


    </style>
@yield('content')

</html>
