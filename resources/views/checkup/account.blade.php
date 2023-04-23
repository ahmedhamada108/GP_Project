@extends('layouts.app')
@section('content')
<div class="landing">
  <div class="account">
    <h2>Account Info
      <i class="fa fa-user fa-fw"></i>
    </h2>
    <div class="container">
        <div class="image">
            <img src="{{ auth('patient')->user()->image }}" alt="profile image">
        </div>
        <form class="form" enctype="multipart/form-data" method="POST"action="{{ route('edit_account') }}">
          @csrf
          <div class="info">
            @include('layouts.sessions_messages')
            @include('layouts.errors')
            {{-- Name Input --}}
              <span id="arrow">Name</span>
              <input required class="input" id="name" name="name" type="text" value="{{ auth('patient')->user()->name }}" disabled>
            {{-- Email Input  --}}
              <span id="arrow">Email</span>
              <input  required class="input" id="email" name="email" type="email" value="{{ auth('patient')->user()->email }}" disabled>
            {{-- Password Input  --}}
              <span id="arrow_password" class="arrow_password" style="display: none;">Password</span>
              <input class="input" style="display: none;" id="password" type="password" >
            {{-- Password Confiramtion    --}}
              <span id="arrow_confirmation" style="display: none;" class="arrow_confirmation">Password Confiramtion</span>
              <input class="input" style="display: none;" id="password_confirmation" type="password">
             {{-- Image Input file    --}}
             <span id="arrow_image" style="display: none;" class="arrow_image">Profile Image</span>
             <input class="input" style="display: none;" id="image" name="image" accept="image/*" type="file">
           
            {{-- Submit hidden button    --}}
              <input type="submit" id="submit" style = "display:none;">
            </div>
        </form>  
        <div class="log">
        <a>
          <button class="submit" id="btn_submit" onclick="toggle();" type="submit" style="width: fit-content;">Edit</button>
        </a>
        </div>
    </div>
  </div>
</div>

@endsection