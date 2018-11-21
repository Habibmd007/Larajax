@extends('layouts.app')
 
@section('content')
<body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                            <p>{{Session::get('msg')}}</p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{route('login')}} " method="post">
                                @csrf
                                    <div class="form-group">
                                        <input class="form-control" placeholder="email" name="email" type="text" >
                                    </div>
    
    
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password">
                                    </div>
    
                                    <div class="checkbox">
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </div>
                                    <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                    <a href="{{ route('user.create') }}" class="btn btn-lg btn-block">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection