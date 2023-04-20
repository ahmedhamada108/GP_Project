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
        <div class="info">
            <span id="arrow">Name</span>
            <input class="input" type="text" value="{{ auth('patient')->user()->name }}" disabled>
            <span id="arrow">Email</span>
            <input class="input" type="email" value="{{ auth('patient')->user()->email }}" disabled>
        </div>
        <div class="log">
          <a href="{{ route('logout') }}" style="float: left">Logout<i class="fa fa-cogs rounded-circle"></i>
          </a>
          <a href="{{ route('history_view') }}" style="float: right">History<img style="width: 26px;" src="{{ asset('imgs/icons8-history-96.png') }}">
          </a>
        </div>
    </div>
  </div>
</div>
@endsection