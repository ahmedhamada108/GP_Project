@extends('layouts.app')
@section('content')
    <!-- landing -->
    <div class="landing">
        <div class="container">
            <div class="sign-in" style="margin-left: auto;margin: auto;">
                <div class="content">
                    @include('layouts.sessions_messages')
                    <h2>Sign In</h2>
                    <form class="form" method="POST"action="{{ route('post_signin') }}">
                        @csrf
                        <input class="input" name="email" value="{{ old('email') }}" type="email" placeholder="Your Email" style="width: 400px;@error('email') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('email')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <input class="input" name="password" type="password" placeholder="Your Password" style="width: 400px;@error('password') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('password')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <a href="{{ route('reset_password') }}">Foreget Password?</a>
                        <input class="submit" type="submit" value="Sign In" style="width: 400px;">
                       </form>
                </div>
        <p class="signP">Not have an account? <a href="{{ route('signup') }}">Sign Up Here</a></p>
    </div>
            <div class="image" style="margin-right: auto;">
                <img src="{{ asset('imgs/login.jpg') }}" alt="landing" >
            </div>
        </div>
        
    </div>
    <!-- landing -->

@endsection