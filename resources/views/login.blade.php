<style>
    /*.center-vh{*/
        /*display: flex;*/
        /*align-items: center;*/
        /*justify-content: center;*/
        /*width: 100%;*/
        /*height: 100%;*/
    /*}*/
    /*.center-v{*/
        /*display: flex;*/
        /*align-items: center;*/
        /*width: 100%;*/
        /*height: 100%;*/
    /*}*/
    /*.center-h{*/
        /*display: flex;*/
        /*align-items: center;*/
        /*width: 100%;*/
        /*height: 100%;*/
    /*}*/
    /*#login-box{*/
        /*border: 1px solid #757575;*/
        /*-webkit-border-radius: 5px;*/
        /*-moz-border-radius: 5px;*/
        /*border-radius: 5px;*/
        /*background-color: #eee;*/
        /*width: 350px;*/
        /*height: 200px;*/
        /*padding: 20px 20px;*/
    /*}*/
    /*.row{*/
        /*padding: 5px 0px;*/
    /*}*/
    /*.full-w{*/
        /*width: 100%;*/
    /*}*/
    /*.pb-20{*/
        /*padding-bottom: 20px;*/
    /*}*/
    /*.mb-20{*/
        /*margin-bottom: 20px;*/
    /*}*/
    /*.mb-10{*/
        /*margin-bottom: 10px;*/
    /*}*/
    /*.text-center{*/
        /*text-align: center;*/
    /*}*/

    /*.button{*/
        /*background-color: #1e88e5;*/
        /*border: none;*/
        /*color: #FFFFFF;*/
        /*padding: 5px 20px;*/
        /*text-align: center;*/
        /*-webkit-transition-duration: 0.4s;*/
        /*transition-duration: 0.4s;*/
        /*text-decoration: none;*/
        /*font-size: 15px;*/
        /*cursor: pointer;*/
        /*-webkit-border-radius: 2px;*/
        /*-moz-border-radius: 2px;*/
        /*border-radius: 2px;*/
    /*}*/
    .input-group-prepend {
        width : 35%; /*adjust as needed*/
    }
    .input-group-prepend span {
        width: 100%;
        overflow: hidden;
    }
</style>

@extends('master')
@section('content')
    <div class="container">

            <div class="row">
                <div class="col">

                </div>

                <div class="col-6">
                    <form action="/login" method="POST">
                        {{csrf_field()}}
                    <h1>Login Form</h1>
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
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" aria-describedby="basic-addon2" placeholder="Enter Password">
                    </div>
                    <br/>
                        <div class="form-group">
                            <input type="checkbox" class="form-check-label" name="remember" value="remember" id="exampleInputPassword1" aria-describedby="basic-addon2">   Remember Me
                        </div>

                    <div class="form-group">
                        <label class="form-check-label" for="exampleCheck1">Doesn't Have An Account?</label><a href="#"> Register Here</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>

                <div class="col">

                </div>
            </div>


    </div>



@endsection