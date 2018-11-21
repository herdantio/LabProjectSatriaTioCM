<style>

</style>

@extends('master')
@section('content')
    <div class="container">

            <div class="row">
                <div class="col">

                </div>

                <div class="col-6">
                    <form action="/register" method="POST">
                        {{csrf_field()}}
                    <h1>Register Form</h1>
                    <br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Name</span>
                        </div>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="exampleInputPassword1" aria-describedby="basic-addon2" placeholder="Enter Name">
                    </div>

                    <br/>
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" >Email</span>
                        </div>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="basic-addon1" placeholder="Enter email">
                    </div>

                    <br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Password</span>
                        </div>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" id="passwordOriginal" aria-describedby="basic-addon2" placeholder="Enter Password">
                    </div>

                    <br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >ReType Password</span>
                        </div>
                        <input type="password" class="form-control" name="password2" value="{{old('password2')}}" id="passwordReType" aria-describedby="basic-addon2" placeholder="Re-type Password">
                    </div>

                    <br/>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Gender</span>
                        </div>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option value="Male" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <br/>

                    <div class="input-group">
                        {{-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Photo</span>
                        </div> --}}
                        <input type="file" class="custom-file-input" name="profile_picture" value="{{old('picture')}}" accept="image/*" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Picture...</label>
                    </div>

                    <br/>
                    <button type="submit" class="btn btn-primary" id="registerBtn">Register</button>
                    </form>

                    <!--display error message-->
                    <br/>
                    @if($errors)
                       <font color="red"><p>{{$errors->first()}}</p></font>
                    @endif

                </div>

                <div class="col">

                </div>
            </div>
    </div>

    
@endsection