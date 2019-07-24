@extends('admin.layouts.glance-admin')

@section('content')
    <div class="main-page signup-page">
        <h2 class="title1">SignUp Here</h2>
        <div class="sign-up-row widget-shadow">
            <h5>Personal Information :</h5>
            <form action="{{ route('admin.register.store') }}" method="post">
                @csrf
                <div class="sign-u">
                    <input type="text" name="name" placeholder="Name" value="{{old('name')}}" required="">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email Address" required="">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <div class="clearfix"> </div>
                </div>
                <h6>Login Information :</h6>
                <div class="sign-u">
                    <input type="password" name="password" placeholder="Password" required="">
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <input type="password" id="password-confirm" name="confirm_password" placeholder="Confirm Password" required="">
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="clearfix"> </div>
                <div class="sub_home">
                    <input type="submit" value="Submit">
                    <div class="clearfix"> </div>
                </div>
                <div class="registration">
                    Already Registered.
                    <a class="" href="{{route('admin.auth.login')}}">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection


