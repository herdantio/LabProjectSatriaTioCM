<html>
<head>
    <link href = {{ asset("bootstrap/css/bootstrap.min.css") }} rel="stylesheet"/>

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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
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
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        @endif

        </ul>
    </div>
    </nav>

    <div class="container ptb-20">
        @yield('content')
    </div>
    <div id="footer">
        Made using Laravel 5.6
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/register.js') }}"></script>
</body>
</html>