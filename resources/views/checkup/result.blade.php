@extends('layouts.app')
@section('content')
<div class="results">
    <div class="main-heading">
        <h2>{{ $sub_disease->sub_disease }}</h2>
        <p>
            {{ $sub_disease->description }}
        </p>
    </div>
  <div class="main-heading">
      <h2>Doctors Suggestion</h2>
  </div>
  <div class="container">
    @foreach($VezzetaDoctors as $VezzetaDoctor)
        <div class="box">
            <img src="{{$VezzetaDoctor['Doctor_image'] }}" alt="ill1">
            <div class="content">
            <h3>{{ $VezzetaDoctor['Doctor_name'] }}</h3>
            <p>{{ $VezzetaDoctor['Doctor_description'] }}</p>
            <table class="table">
            @if(LaravelLocalization::getCurrentLocale() =="en")        
                <tbody>
                    <tr style="border-top: solid 1px #0000002b;">
                        <th class="th_doctor" scope="row">Address</th>
                        <td>{{ $VezzetaDoctor['Address'] }}</td>
                    </tr>
                    <tr style="border-top: solid 1px #0000002b;">
                        <th class="th_doctor" scope="row">Fee</th>
                        <td>{{ $VezzetaDoctor['Doctor_fee'] }}</td>
                    </tr>
                </tbody>
            @else
                <tbody>
                    <tr style="border-top: solid 1px #0000002b;">
                        <td style="float: right;"> {{ $VezzetaDoctor['Address'] }} </td>
                        <th class="th_doctor">العنوان</th>
                    </tr>
                    <tr style="border-top: solid 1px #0000002b;">
                        <td style="float: right;"> {{ $VezzetaDoctor['Doctor_fee'] }} </td>
                        <th class="th_doctor">الكشف</th>
                    </tr>
                </tbody>        
            @endif        
            </table>
            </div>
            <div class="info" style="border-top: solid 1px #0000002e;">
                <a href="{{ $VezzetaDoctor['Doctor_profile'] }}" target="_blank">Book Now</a>
            </div>
        </div>
    @endforeach

  </div>
</div>

@endsection