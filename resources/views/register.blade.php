<style>
    .center-vh{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .center-v{
        display: flex;
        align-items: center;
        width: 100%;
        height: 100%;
    }
    .center-h{
        display: flex;
        align-items: center;
        width: 100%;
        height: 100%;
    }
    #login-box{
        border: 1px solid #757575;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        background-color: #eee;
        width: 350px;
        height: 200px;
        padding: 20px 20px;
    }
    .row{
        padding: 5px 0px;
    }
    .full-w{
        width: 100%;
    }
    .pb-20{
        padding-bottom: 20px;
    }
    .mb-20{
        margin-bottom: 20px;
    }
    .mb-10{
        margin-bottom: 10px;
    }
    .text-center{
        text-align: center;
    }

    .button{
        background-color: #1e88e5;
        border: none;
        color: #FFFFFF;
        padding: 5px 20px;
        text-align: center;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
        text-decoration: none;
        font-size: 15px;
        cursor: pointer;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }
</style>

@extends('master')
@section('content')
    <form action="/login" method="POST">
        {{csrf_field()}}
        <div class="center-vh">
            <div id="login-box">
                <div class="row">E-mail</div>
                <div class="row">
                    <input type="text" class="full-w mb-10" name="email">
                </div>
                <div class="row">Password</div>
                <div class="row">
                    <input type="password" class="full-w mb-10" name="password">
                </div>
                <div class="row text-center">
                    <button class="button">Login</button>
                </div>
            </div>
        </div>
    </form>
@endsection