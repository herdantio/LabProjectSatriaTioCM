<html>
<head>
    <style>
        *{
            padding: 0px;
            margin: 0px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: Arial;
        }
        #header{
            display: table;
            width: 100%;
            height: 35px;
            background-color: #1e88e5;
            box-shadow: 2px 2px 2px 2px #bbdefb;
        }
        .inline-block{
            display: inline-block;
        }
        .menu{
            font-size: 22px;
            line-height: 35px;
            font-family: Arial;
            color: #fff;
            padding: 0px  15px;
        }

        .clr{
            clear: both;
        }

        #footer{
            background-color: #1e88e5;
            color: #fff;
            text-align: center;
            height: 25px;
            font-size: 15px;
            padding: 5px 0;
        }

        .container{
            width: 100%;
            padding: 0 10%;
            min-height: 600px;
        }

        .ptb-20{
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .float-col6{
            display: table-cell;
            width: 50%;
            /*display: inline-block;*/
        }
        .text-right{
            text-align: right;
        }
    </style>
    <link href = {{ asset("bootstrap/css/bootstrap.min.css") }} rel="stylesheet"/>

</head>
<body>
    <div id="header">
        <div class="float-col6">
            <a href="/"><p class="inline-block menu">Home</p></a>
        </div>
        {{--<nav class="navbar navbar-light bg-light">--}}
            {{--<form class="form-inline">--}}
                {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
            {{--</form>--}}
        {{--</nav>--}}
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
    </div>
    <div class="container ptb-20">
        @yield('content')
    </div>
    <div id="footer">
        Made using Laravel 5.6
    </div>
</body>
</html>