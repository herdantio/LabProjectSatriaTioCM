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
                                            <h4>{{$data['owner_name']->name}}</h4>
                                            <br/>
                                            <h1>{{$data['post_data']->title}}</h1>
                                            <h5>{{$data['category_name']->category_name}}</h5>
                                        </div>
                                        @if(!Auth::guest())
                                            <div class="col-md-5 btn-post">
                                                @if(Auth::user()->isAdmin
                                                || Auth::user()->owner_id!=$data['post_data']->owner_id)
                                                <button class="btn btn-primary">Add to cart</button>
                                                @endif

                                                @if(Auth::user()->isAdmin
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

                                <div class="container-fluid jumbotron-comment-list">
                                    <div class="row comments-header">
                                        <p>Comments</p>
                                    </div>
                                    <div class="row comments-body">
                                        @foreach($data['comments_data'] as $comment)
                                            <div class="row comments-detail">
                                                {{--<div class="col-md-2">--}}
                                                    {{--<img class="comment-img" src="{{asset("UsersUploadedImage/").'/'.$data['post_data']->picture}}"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="col">--}}
                                                    {{--<h5>{{$comment->commenter_id}}</h5>--}}
                                                    {{--<p>{{$comment->comment_text}}</p>--}}
                                                    {{--<p>{{$comment}}</p>--}}
                                                {{--</div>--}}
                                                <div class="col-md-2">
                                                    <img class="comment-img" src="{{asset("UsersUploadedImage/").'/'.$comment->profile_picture}}"/>
                                                </div>
                                                <div class="col">
                                                    <h5>{{$comment->name}}</h5>
                                                    <p>{{$comment->comment_text}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <br/>
                                @if(!Auth::guest())
                                <div class="jumbotron-comment">
                                    <form method="POST" action="/postdetail/{{$data['post_data']->id}}">

                                        <div class="form-group">
                                            <p>Add your comment...</p>
                                            <textarea name="comment_text" class="form-control" placeholder="Write your comment here..."></textarea>
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