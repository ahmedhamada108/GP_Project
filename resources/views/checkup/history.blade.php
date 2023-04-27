@extends('layouts.app')
@section('content')
<div class="landing">
    <!-- history -->
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <div class="history">
            @if($histories->count() >= 1)
            <h2>History</h2>
            @else
            <h2 style="color: #06060682 !important;position: relative;top: 14pc;">No Data To Display It.</h2>
            @endif
            <div class="container" style="padding-bottom: 53px !important">
                @if($histories->count() >= 1)
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
                @endif
            </div>
            {{ $histories->links('pagination.custom') }}
        </div>
    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
        <div class="history">
            @if($histories->count() >= 1)
            <h2>السجل</h2>
            @else
            <h2 style="color: #06060682 !important;position: relative;top: 14pc;">لا يوجد معلومات لعرضها</h2>
            @endif
            <div class="container" style="padding-bottom: 53px !important">
                @if($histories->count() >= 1)
                <table>
                    <tr>
                        <th>الفئة</th>
                        <th>المرض</th>
                        <th>التاريخ</th>
                        <th>الصورة</th>
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
                            <button class="btn" id="myImg{{ $history->id }}">عرض</button>
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
                @endif
            </div>
            {{ $histories->links('pagination.custom') }}
        </div>
    @endif
</div>  
  <!-- history -->
@endsection