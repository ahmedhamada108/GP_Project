@extends('layouts.app')
@section('content')
<div class="results">
  <div class="main-heading">
    @include('layouts.sessions_messages')
    @include('layouts.errors')
      <h2>{{ $sub_diseases['disease_name']}}</h2>
      <p style="margin: 0 auto 0px !important;">
        {{ $sub_diseases['disease_descriptions'] }}
      </p>
      @foreach($sub_diseases['sub_diseases'] as $sub_disease)
        <p style=" margin: 0 auto -12px !important;">
          {{ $sub_disease['sub_disease'] }}
        </p>      
      @endforeach
      <!-- Button trigger modal -->
      <input type="button" class="submit" value="Start Check" style="width: auto;" data-toggle="modal" data-target="#exampleModalCenter">

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">{{ $sub_diseases['disease_name']}}</h5>
              <button  style="outline: none" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="outline: none" aria-hidden="true">&times;</span>
              </button>
            </div>
          <form class="form" enctype="multipart/form-data" method="POST"action="{{ route('result') }}">
            @csrf  
            <div class="modal-body">
              <input name="image" class="file_input" type="file" id="file_input" accept="image/*" >
              <input name="city_patient" id="city" style="display: none;" class="file_input" type="text" >
              <div class="div_input_file" onclick="document.getElementById('file_input').click();" class="file_area">
                <div style="margin: -18px;">
                  <img id="image_chosen" src="{{ asset('imgs/icons8-file-upload-53.png') }}" />
                  <p id="fileinfo">Upload Your Image Here </p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form> 
          </div>
        </div>
      </div>
  </div>
</div>
<script>
  var state = document.getElementById("city");
  window.onload = function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(showPosition);
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
  function showPosition(position) {
    const lat = position.coords.latitude ;
    const lon = position.coords.longitude ;

    fetch(`https://geocode.maps.co/reverse?lat=${lat}&lon=${lon}`)
      .then(response => response.json())
      .then(data =>
       state.value = data.address.state.replace('Governorate', '').replace(/\s/g, '')
       )
      .catch(error => console.error(error));
  }
</script>
@endsection