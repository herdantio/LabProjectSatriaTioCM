@extends('master')
@section('content')
    @if(!Auth::guest())
        <p>Welcome HOME, {{Auth::user()->name}}</p>
    @endif
@endsection