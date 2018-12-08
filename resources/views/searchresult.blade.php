@extends('master')
@section('content')
    <p>Welcome to my practice website!</p>

    @if(!Auth::guest())
        @if(Auth::user()->isAdmin == 1)
            <p>Welcome HOME, Admin {{Auth::user()->name}}</p>
        @else
            <p>Welcome HOME, {{Auth::user()->name}}</p>
        @endif
    @endif

    <h2>Showing search result for "[something]"</h2>

@endsection