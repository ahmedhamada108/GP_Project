@extends('layouts.app')
@section('content')
    <!-- landing -->
    <div class="landing resetpassword">
        <div class="container">
            <div class="sign-in" style="margin-left: auto;margin: auto;">
                <div class="content">
                    @include('layouts.sessions_messages')
                    <h2>Forget Password?</h2>
                    <form class="form" method="POST"action="{{ route('send_otp') }}">
                        @csrf
                        <input class="input resetpasswordinput" name="email" value="{{ old('email') }}" type="email" placeholder="Your Email" style="width: 400px;@error('email') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('email')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <input class="submit" type="submit" value="Send OTP" style="width: 400px;">
                       </form>
                </div>
    </div>
            <div class="image" style="margin-right: auto;">
                <img src="{{ asset('imgs/forgetPassword.png') }}" alt="landing" >
            </div>
        </div>
        
    </div>
    <!-- landing -->

@endsection