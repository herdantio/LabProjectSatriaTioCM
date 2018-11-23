@extends('master')
@section('content')
    <p>Welcome to my practice website!</p>

    @if(!Auth::guest())
        <p>Welcome HOME, {{Auth::user()->name}}</p>
    @endif

    <link href = {{ asset("css/register.css") }} rel="stylesheet"/>
    <div class="container">

        <div class="row">
            <div class="col">

            </div>

            <div class="col-6">
                <form action="/register" enctype="multipart/form-data" method="POST">
                    {{csrf_field()}}

                    <br/>
                    <h1>Register Form</h1>
                    <br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Title</span>
                        </div>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" id="exampleInputTitle1" aria-describedby="basic-addon2" placeholder="Input title here">
                    </div>

                    <br/>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" >Caption</span>
                        </div>
                        <input type="text" class="form-control" name="caption" value="{{old('caption')}}" id="exampleInputEmail1" aria-describedby="basic-addon1" placeholder="Enter email">
                    </div>

                    <br/>
                    <div class="input-group">
                        {{-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Photo</span>
                        </div> --}}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" >Image</span>
                        </div>
                        <input type="file" class="custom-file-input" name="post_picture" value="{{old('post_picture')}}" accept="image/*" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Picture...</label>
                    </div>
                    <br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" >Price</span>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" >Rp.</span>
                        </div>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}" id="exampleInputPrice" aria-describedby="basic-addon1" placeholder="Price">
                    </div>
                    <br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2" >Category</span>
                        </div>
                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                            <option value="No_Game_No_Life" >No Game No Life</option>
                            <option value="Gringar_Ash">Gringar Ash</option>
                            <option value="Bungou_Stray_Dogs">Bungou Stray Dogs</option>
                            <option value="Cinderella_Girls">Idolm@ster Cinderella Girls</option>
                        </select>
                    </div>

                    <br/>
                    <button type="submit" class="btn btn-primary" id="addBtn" onclick="validate()">Add</button>
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