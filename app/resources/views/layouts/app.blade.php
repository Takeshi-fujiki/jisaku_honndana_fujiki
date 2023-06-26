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
    <link rel="stylesheet" href="https://kit.fontawesome.com/67fc42cf07.css" crossorigin="anonymous">

    <script src=“https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js”></script>
    <script src="https://kit.fontawesome.com/67fc42cf07.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/books.js') }}" defer></script>
    <script src="{{ asset('js/ajaxlikes.js') }}" defer></script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
    <script src="{{ asset('js/notAjaxCalendar.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>

    
    </head>
<body>
    <div id="app">
    @guest
    <nav class="navbar nav-header navbar-expand-md navbar-light bg-light bg-gradient shadow">
        <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                    <img src="{{ asset('storage/images/book.jpg') }}" width="50" height="50">
                    <a class=" rogo" href="{{ url('/') }}">
                    AcialLibrary
                    </a>
                </li>
            </ul>
        </div>
        @if(Auth::check())
        <span class="my-navber-item">{{ Auth::user()->name }}</span>
        /
        <a href="#" id="logout" class="my-navber-item">ログアウト</a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
        <script>
            document.getElementById('logout').addEventListener('click',function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
            });
        </script>
        @else
            <a class="my-navber-item" href="{{ route('user.register') }}">会員登録</a>
        @endif
    </nav> 
    @else
    <nav class="navbar nav-header navbar-expand-md navbar-light bg-light bg-gradient shadow">
        <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                    <img src="{{ asset('storage/images/book.jpg') }}" width="50" height="50">
                    <a class=" rogo" href="{{ url('/user/index') }}">
                    AcialLibrary
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="dropdown-item" href="{{ route('user.display.show', Auth::id()) }}">マイページ</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="dropdown-item" href="{{ route('user.likesList') }}">お気に入り一覧</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="dropdown-item" href="{{ route('user.user.edit',['user' => Auth::id()],'edit') }}">アカウント情報変更</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="dropdown-item" href="{{ route('user.display.index') }}">過去のコメント一覧</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <button class="btn btn-outline-primary mx-2"><a class="dropdown-item" href="{{ route('user.calendar') }}">Ajaxあり</a></button>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                <button class="btn btn-outline-primary"><a class="dropdown-item" href="{{ route('user.notAjax_calendar') }}">Ajaxなし</a></button>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if(Auth::check())
                    <span class="my-navber-item">{{ Auth::user()->name }}</span>
                    /
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                    <button class="btn">
                        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                        </a>
                    </button>
                <script>
                    document.getElementById('logout').addEventListener('click',function(event) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                    });
                </script>
                @else
                    <a class="my-navber-item" href="{{ route('user.register') }}">会員登録</a>
                @endif
                </li>
            </ul>

        </div>
    </nav> 

@endguest

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
        padding: 0.5em 0.7em;
        margin-bottom: 0.2em;
        position: relative;
    }
    .image{
        position: absolute;
        /* left:138px; */
        
    }
    
    .navbar{
        padding: 1.5rem 1rem !important;
    }
    
    .pl-0{
        padding-left: 0 !important;
    }
    
    .pr-0{
        padding-right: 0 !important;
    }
    </style>


@yield('content')

</html>
