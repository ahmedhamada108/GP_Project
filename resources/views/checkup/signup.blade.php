@extends('layouts.app')
@section('content')
    <!-- landing -->
    <div class="landing">
        <div class="container">
            <div class="sign-in" style="margin-left: auto;margin: auto;">
                <div class="content">
                    @include('layouts.sessions_messages')
                    <h2>Sign Up</h2>
                    <form class="form" method="POST"action="{{ route('post_signup') }}">
                        @csrf
                        <input class="input"  name="name" value="{{ old('name') }}" placeholder="Your Name" style="width: 400px;@error('name') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('name')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <input class="input" name="email" value="{{ old('email') }}" type="email" placeholder="Your Email" style="width: 400px;@error('email') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('email')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <input class="input" name="password" type="password" placeholder="Your Password" style="width: 400px;@error('password') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('password')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <input class="input" name="password_confirmation" type="password" placeholder="Your Confirmation Password" style="width: 400px;@error('password_confirmation') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('password_confirmation')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;@error('name') border-bottom: 1px solid #dc3545 !important; @enderror">{{ $message }}</p>
                        @enderror
                        <input class="submit" type="submit" value="Sign Up" style="width: 400px;">
                    </form>
                </div>
        <p class="signP">Not have an account? <a href="{{ route('login') }}">Sign In Here</a></p>
    </div>
            <div class="image" style="margin-right: auto;">
                <img src="{{ asset('imgs/login.jpg') }}" alt="landing" >
            </div>
        </div>
        
    </div>
    <!-- landing -->

@endsection