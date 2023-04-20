@extends('layouts.app')
@section('content')
<div class="landing">
    <!-- history -->
    <div class="history">
        <h2>History</h2>
        <div class="container" style="padding-bottom: 53px !important">
            <table>
                <tr>
                    <th>Category</th>
                    <th>Disease</th>
                    <th>Date</th>
                    <th>Image</th>
                </tr>
            @foreach($histories as $history)
              <tr>
                  <td>
                      <span>{{ $history->disease->disease_name }}</span>
                  </td>
                  <td>
                      <span>{{ $history->sub_disease->Sub_disease_name }}</span>
                  </td>
                  <td>
                    <span>{{ $history->created_at->format('Y.m.d g:i A') }}</span>
                  </td>
                  <td>
                      <button class="btn" id="myImg{{ $history->id }}">Dispaly</button>
                  </td>
                <!-- the model -->
                <div id="myModel{{ $history->id }}" class="model">
                    <span class="close" id="{{ $history->id }}">&times;</span>
                    <img class="model-content" alt="{{ $history->id }}" src="{{ $history->image }}" id="img01{{ $history->id }}">
                </div>
                <!-- The model -->
              </tr>
            @endforeach  
            </table>
        </div>
        {{ $histories->links('pagination.custom') }}
    </div>
</div>  
  <!-- history -->
@endsection