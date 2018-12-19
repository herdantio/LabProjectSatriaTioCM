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
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="jumbotron">
                                <div class="jumbotron-header">
                                    <div class="row">
                                        <div class="col">
                                            <h4>{{$data['post_data']->owner_id}}</h4>
                                            <br/>
                                            <h1>{{$data['post_data']->title}}</h1>
                                            <h5>{{$data['post_data']->caption}}</h5>
                                        </div>
                                        @if(!Auth::guest())
                                            <div class="col-md-5 btn-post">
                                                @if(Auth::user()->isAdmin()
                                                || Auth::user()->owner_id!=$data['post_data']->owner_id)
                                                <button class="btn btn-primary">Add to cart</button>
                                                @endif

                                                @if(Auth::user()->isAdmin()
                                                || Auth::user()->owner_id==$data['post_data']->owner_id)
                                                <button class="btn btn-primary">Delete Post</button>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="jumbotron-image">
                                    <img id="img-post" src="{{asset("UsersUploadedImage/").'/'.$data['post_data']->picture}}">
                                </div>

                                <div class="jumbotron-desc">
                                    <h5>{{$data['post_data']->caption}}</h5>
                                </div>
                                <br/>
                                @if(!Auth::guest())
                                <div class="jumbotron-comment">
                                    <form method="POST">

                                        <div class="form-group">
                                            <p>Add your comment...</p>
                                            <textarea name="comment" class="form-control" placeholder="Write your comment here...">
                                            </textarea>
                                        </div>

                                        <div class="comment-btn">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>

                                    </form>
                                </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection