@extends('master')
@section('content')
    <link href = {{ asset("css/home.css") }} rel="stylesheet"/>
    <div class="container">
        <div class="row">
            @if(!Auth::guest())
                @if(Auth::user()->isAdmin == 1)
                    <p>Welcome HOME, Admin {{Auth::user()->name}}</p>
                @endif
            @endif
        </div>
        <div class="row">

            <div class="container">
                <div class="row">
                    @foreach ($p as $index => $post)
                        <div class="col-md-2" class="post">
                            <a href="/postdetail/{{$post->id}}">
                                <img class="img-post" src="{{asset("UsersUploadedImage/").'/'.$post->picture}}"/>
                                <h3>{{$post->title}}</h3>
                                <p>{{$post->caption}}</p>
                            </a>
                        </div>
                    @endforeach
                    {{--@for($i=0;$i<5;$i++)--}}
                        {{--<div class="col" class="post">--}}
                            {{--<img class="img-post" src="{{asset("UsersUploadedImage/").'/'.$p[$i]['picture']}}"/>--}}
                            {{--<h3>{{$p[$i]['title']}}</h3>--}}
                            {{--<p>{{$p[$i]['caption']}}</p>--}}
                        {{--</div>--}}
                    {{--@endfor--}}

                </div>

            </div>

        </div>
    </div>





@endsection