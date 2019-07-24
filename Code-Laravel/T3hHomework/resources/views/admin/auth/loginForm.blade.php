@extends('admin.layouts.glance-admin')

@section('content')
    <div class="main-page login-page ">
        <h2 class="title1">Login</h2>
        <div class="widget-shadow">
            <div class="login-body">
                <form action="{{ route('admin.auth.loginAdmin') }}" method="post">
                    @csrf

                    <input type="email" class="user" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required="">
                    <input type="password" name="password" class="lock" value="" placeholder="Password" required="">
                    <div class="forgot-grid">
                        <label class="checkbox"><input type="checkbox" name="checkbox"  {{ old('remember') ? 'checked' : '' }}><i></i>Remember me</label>
                        <div class="forgot">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="Sign In" value="Sign In">
                    <div class="registration">
                        Don't have an account ?
                        <a class="" href="{{ route('admin.register') }}">
                            Create an account
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection


