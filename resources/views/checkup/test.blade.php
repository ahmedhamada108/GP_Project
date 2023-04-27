@extends('layouts.app')
@section('content')
  <div class="results">
    <div class="main-heading" id="city">

    </div>
  </div>
<script>
  var state = document.getElementById("city");
  window.onload = function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
  function showPosition(position) {
    const lat = position.coords.latitude ;
    const lon = position.coords.longitude ;

    fetch(`https://geocode.maps.co/reverse?lat=${lat}&lon=${lon}`)
    .then(response => response.json())
    .then(data => {
      console.log(data); // Log the response to the console
      state.innerHTML = JSON.stringify(data); // Display the response as a string in the HTML
    })
    .catch(error => console.error(error));
  }
</script>
@endsection