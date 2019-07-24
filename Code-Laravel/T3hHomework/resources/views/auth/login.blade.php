@extends('frontend.layouts.fashion')

@section('content')
    <div class="login">

        <div class="main-agileits">
            <div class="form-w3agile">
                <h3>Login</h3>
                <form action="#" method="post">
                    @csrf
                    <div class="key">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="text" name="email" required="" placeholder="Email">
                        @error('email')
                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password" required="" placeholder="Password">
                        @error('password')
                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="forg">
                <a href="#" class="forg-left">Forgot Password</a>
                <a href="{{url('/register')}}" class="forg-right">Register</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
