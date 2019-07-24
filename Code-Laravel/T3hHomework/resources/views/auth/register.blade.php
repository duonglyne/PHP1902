@extends('frontend.layouts.fashion')

@section('content')
    <div class="login">

        <div class="main-agileits">
            <div class="form-w3agile">
                <h3>Register</h3>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="key">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" name="name" value="{{ old('name') }}" required="" placeholder="Name">
                        @error('name')
                        <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="key">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="text" name="email" value="{{ old('email') }}" required="" placeholder="Email">
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
                    <div class="key">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                        <div class="clearfix"></div>
                    </div>
                    <input type="submit" value="Register">
                </form>
            </div>
            <div class="forg">
                <a href="{{url('/login')}}" class="forg-right">Login</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
