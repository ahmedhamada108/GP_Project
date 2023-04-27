@extends('layouts.app')
<?php 
require_once app_path('Helpers/EmailMaskHelper.php');
?>
@section('content')
    <!-- landing -->
    <div class="landing resetpassword">
        <div class="container">
            <div class="sign-in" style="margin-left: auto;margin: auto;">
            @if(LaravelLocalization::getCurrentLocale() == 'en')
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
            @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                <div class="content">
                    @include('layouts.sessions_messages')
                    <h2>نسيت كلمة المرور?</h2>
                    <form class="form" method="POST"action="{{ route('send_otp') }}">
                        @csrf
                        <input class="input resetpasswordinput"  name="email" value="{{ old('email') }}" type="email" placeholder="...بريدك الالكتروني" style="text-align:end;width: 400px;@error('email') border-bottom: 1px solid #dc3545 !important; @enderror">
                        @error('email')
                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                        @enderror
                        <input class="submit" type="submit" value="ارسل الرقم السري" style="letter-spacing: 1px !important;width: 400px;">
                    </form>
                </div>
            @endif
    </div>
            <div class="image" style="margin-right: auto;">
                <img src="{{ asset('imgs/forgetPassword.png') }}" alt="landing" >
            </div>
        </div>
        
    </div>
    <!-- landing -->

@endsection