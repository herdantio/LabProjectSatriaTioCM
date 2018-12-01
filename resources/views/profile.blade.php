@extends('master')
@section('content')
    @if(!Auth::guest())
        {{--<p>Welcome HOME, {{Auth::user()->name}}</p>--}}
        <br/>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img style="width: 30%; border-radius: 50%; float: right;" src="{{asset("UsersUploadedImage/bootstrap-stack.png")}}"/>
                </div>
                <div class="col">
                    <h1>{{Auth::user()->name}}</h1>
                    <h4>{{Auth::user()->email}}</h4>
                </div>
                <div class="col"></div>
            </div>

            <div class="row">
                <div class="col">

                </div>

                <div class="col-6">
                    <form action="/register" enctype="multipart/form-data" method="POST">
                        {{csrf_field()}}

                        <br/>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2" >User ID</span>
                            </div>
                            <input type="text" class="form-control" value="{{Auth::user()->id}}" disabled aria-describedby="basic-addon2">
                        </div>

                        <br/>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2" >Name</span>
                            </div>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="exampleInputPassword1" aria-describedby="basic-addon2">
                        </div>

                        <br/>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" >Email</span>
                            </div>
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" id="exampleInputEmail1" aria-describedby="basic-addon1" placeholder="Enter email">
                        </div>

                        <br/>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2" >Password</span>
                            </div>
                            <input type="password" class="form-control" name="password" value="{{Auth::user()->password}}" id="passwordOriginal" aria-describedby="basic-addon2" placeholder="Enter Password">
                        </div>

                        <br/>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2" >Gender</span>
                            </div>
                            <select class="form-control" id="exampleFormControlSelect1" name="gender" value="{{Auth::user()->gender}}">
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <br/>
                        <button type="submit" class="btn btn-primary" id="registerBtn" >Save Changes</button>
                        <button type="button" class="btn btn-primary" onclick="discard()">
                            Discard Changes
                        </button>
                    </form>

                    <!--display error message-->
                    <br/>

                </div>

                <div class="col">

                </div>
            </div>
        </div>


    @endif
@endsection