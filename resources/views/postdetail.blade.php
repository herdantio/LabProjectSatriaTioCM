@extends('master')
@section('content')
    {{--@if(!Auth::guest())--}}
        {{----}}
    {{--@endif--}}
    <link href = {{ asset("css/post_detail.css") }} rel="stylesheet"/>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="jumbotron">
                                <h4>{{$data['post_data']->owner_id}}</h4>
                                <h4>{{$data['post_data']->title}}</h4>
                                <h4>{{$data['post_data']->caption}}</h4>
                                <img id="img-post" src="{{asset("UsersUploadedImage/").'/'.$data['post_data']->picture}}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection