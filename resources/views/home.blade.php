@extends('master')
@section('content')
    <link href = {{ asset("css/register.css") }} rel="stylesheet"/>
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
                    @foreach ($p as $post)
                        <div class="col-md-2" >
                            <img src="{{asset("UsersUploadedImage/").'/'.$post->picture}}"/>
                            <h3>{{$post->title}}</h3>
                            <p>{{$post->caption}}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>





@endsection