<html>
<head>
    <link href = {{ asset("bootstrap/css/bootstrap.min.css") }} rel="stylesheet"/>
    <link href = {{ asset("css/menubar.css") }} rel="stylesheet"/>
</head>
<body>
    {{-- <div id="header">
        <div class="float-col6">
            <a href="/"><p class="inline-block menu">Home</p></a>
        </div>
        @if(Auth::guest())
            <div class="float-col6 text-right">
                <a href="/login"><p class="inline-block menu">Login</p></a>
                <a href="/register"><p class="inline-block menu">Register</p></a>
            </div>
        @else
            <div class="float-col6 text-right">
                <a href="/logout"><p class="inline-block menu">Logout</p></a>
            </div>
        @endif
<<<<<<< HEAD
=======
    </div> --}}

    <!--Search Bar-->
    {{--<form action ="{{url('/')}}" method = "get" >--}}
        {{--<input type = "text" name = "keyword" placeholder = "Search by title or description...">--}}
        {{--<button>Search</button>--}}

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <form class="form-inline input-group my-2 my-lg-0" style="width: 50%">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        
        @if(Auth::guest())
                <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
        @else
            @if(auth()->user()->isAdmin == 1)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Manage
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/manageusers">Manage User</a>
                        <a class="dropdown-item" href="managecategories">Manage Categories</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">View All Transactions</a>
                    </div>
                </li>
            @endif
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">My Post</a>
                </li>
                <li class="nav-item">
                    {{--<img class="nav-link" src={{ asset("UsersUploadedImage/bootstrap-stack.png") }} id="img-logo" class="img-thumbnail">--}}
                    <a class="nav-link" href="/profile">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                 </li>

        @endif

        </ul>
    </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{--<a class="navbar-brand">Test</a>--}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div id="navbar-clock"></div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container ptb-20">
        @yield('content')
    </div>
    {{--<div id="footer">--}}
        {{--Made using Laravel 5.6--}}
    {{--</div>--}}

    <script type="text/javascript" src="{{ URL::asset('js/register.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/profile.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/navbar-watch.js') }}"></script>
    <script src={{asset("js/jquery-3.2.1.slim.min.js")}} crossorigin="anonymous"></script>
    <script src={{asset("bootstrap/js/bootstrap.min.js")}}></script>
</body>
</html>