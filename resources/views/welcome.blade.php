@extends('master')
@section('content')
    <p>Welcome to my practice website!</p>

    @if(!Auth::guest())
        <p>Welcome HOME, {{Auth::user()->name}}</p>
    @endif

@endsection