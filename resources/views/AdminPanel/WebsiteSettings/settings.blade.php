@extends('layouts.panel')
@section('content')
  <div class="page-content margin-lg">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body personal-info">
            @include('layouts.sessions_messages')
            @include('layouts.errors')
          <div class="d-flex flex-wrap flex-row justify-content-between align-items-center">
            <h6 class="card-title">Settings</h6>
          </div> 
          <hr>
        <form method="POST" action="{{ route('update.settings',$settings->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
          <div class="form-group">
            <label for="exampleInputUsername1">Facebook URL</label>
            <input name="facebook_url" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" style="@error('facebook_url') border-bottom: 1px solid #dc3545 !important; @enderror" value="{{ $settings->facebook_url }}" placeholder="Facebook URL">
            @error('facebook_url')
            <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Twitter URL</label>
            <input name="twiiter_url" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" value="{{ $settings->twiiter_url }}" placeholder="Twitter URL">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">LinkedIn URL</label>
            <input name="linkedin_url" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" value="{{ $settings->linkedin_url }}" placeholder="LinkedIn URL">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Google+ URL</label>
            <input name="google_url" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" value="{{ $settings->google_url }}" placeholder="Google+ URL">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Location</label>
            <input name="location" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" value="{{ $settings->location }}" placeholder="Location">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" value="{{ $settings->email }}" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Phone</label>
            <input name="phone" type="text" class="form-control" id="exampleInputUsername1" 
            autocomplete="off" value="{{ $settings->phone }}" placeholder="Phone">
          </div>  
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Website Description AR</label>
            <textarea name="website_description_ar" class="form-control" id="exampleFormControlTextarea1" rows="5">
              {{ $settings->website_description_ar }}
            </textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Website Description EN</label>
            <textarea name="website_description_en" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $settings->website_description_en }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">About Us Section AR</label>
            <textarea name="about_us_ar" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $settings->about_us_ar }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">About Us Section EN</label>
            <textarea name="about_us_en" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $settings->about_us_en }}</textarea>
          </div>
          <div class="d-flex align-items-center justify-content-end">
            <input type="submit" class="btn btn-primary" value="Save changes">
          </div>
        </form>
        </div>
      </div>
  </div>
  </div>
@endsection