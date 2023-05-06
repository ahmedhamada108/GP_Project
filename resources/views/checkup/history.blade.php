@extends('layouts.app')
@section('content')
<div class="landing">
    <!-- history -->
    @if(LaravelLocalization::getCurrentLocale() == 'en')
        <div class="history">
            @include('layouts.sessions_messages');
            @if($histories->count() >= 1)
            <h2>History</h2>
            <form action="{{route('delete.history')}}" method="post">
                @csrf
                @method('delete')
                <input style="display:none;" id="IDs" type="text" name="IDs[]">
                <button type="submit" id="delete_btn" class="submit" style="display: none;" >Delete Selected</button>
            </form>
            @else
            <h2 style="color: #06060682 !important;position: relative;top: 14pc;">No Data To Display It.</h2>
            @endif
            <div class="container" style="padding-bottom: 53px !important">
                @if($histories->count() >= 1)
                <table>
                    <tr>
                        <th>
                            <input type="checkbox" id="select-all">
                        </th>
                        <th>Category</th>
                        <th>Disease</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>PDF</th>

                    </tr>
                    @foreach($histories as $history)
                    <tr id="row{{ $history['id'] }}">
                        <td><input type="checkbox" name="row" value="{{$history['id']}}"></td>
                        <td>
                            <span>{{ $history['disease_name'] }}</span>
                        </td>
                        <td>
                            <span>{{ $history['sub_disease_name'] }}</span>
                        </td>
                        <td>
                            <span>{{ $history['check_date']}}</span>
                        </td>
                        <td>
                            <button class="btn" id="myImg{{ $history['id'] }}">Dispaly</button>
                        </td>
                        <td>
                            <a href="{{$history['PDF_URL']}}" download class="btn">Download PDF</a>
                        </td>
                        <!-- the model -->
                        <div id="myModel{{ $history['id'] }}" class="model">
                            <span class="close" id="{{ $history['id'] }}">&times;</span>
                            <img class="model-content" alt="{{ $history['id'] }}" src="{{ $history['image'] }}" id="img01{{ $history['id'] }}">
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
            @include('layouts.sessions_messages');
            @if($histories->count() >= 1)
            <h2>السجل</h2>
            @else
            <h2 style="color: #06060682 !important;position: relative;top: 14pc;">لا يوجد معلومات لعرضها</h2>
            <form action="{{route('delete.history')}}" method="post">
                @csrf
                @method('delete')
                <input style="display:none;" id="IDs" type="text" name="IDs[]">
                <button type="submit" id="delete_btn" class="submit" style="display: none;" >Delete Selected</button>
            </form>
            @endif
            <div class="container" style="padding-bottom: 53px !important">
                @if($histories->count() >= 1)
                <table>
                    <tr>
                        <th>
                            <input type="checkbox" id="select-all">
                        </th>
                        <th>الفئة</th>
                        <th>المرض</th>
                        <th>التاريخ</th>
                        <th>الصورة</th>
                        <th>الملف</th>

                    </tr>
                    @foreach($histories as $history)
                    <tr id="row{{ $history['id'] }}">
                        <td><input type="checkbox" name="row" value="{{$history['id']}}"></td>
                        <td>
                            <span>{{ $history['disease_name'] }}</span>
                        </td>
                        <td>
                            <span>{{ $history['sub_disease_name'] }}</span>
                        </td>
                        <td>
                            <span>{{ $history['check_date'] }}</span>
                        </td>
                        <td>
                            <button class="btn" id="myImg{{ $history['id'] }}">عرض</button>
                        </td>
                        <!-- the model -->
                        <div id="myModel{{ $history['id'] }}" class="model">
                            <span class="close" id="{{ $history['id'] }}">&times;</span>
                            <img class="model-content" alt="{{ $history['id'] }}" src="{{ $history['image'] }}" id="img01{{ $history->id }}">
                        </div>
                        <!-- The model -->
                    </tr>
                    <td>
                        <a href="{{$history['PDF_URL']}}" download class="btn">تحميل الملف</a>
                    </td>
                    @endforeach  
                </table>
                @endif
            </div>
            {{ $histories->links('pagination.custom') }}
        </div>
    @endif
</div>  
<script>
    var selectAllCheckbox = document.getElementById("select-all");
    var rowCheckboxes = document.querySelectorAll("input[name=row]");
    var delete_btn = document.getElementById("delete_btn");
    var IDs_input = document.getElementById("Ids");

    var selectedRowIds = [];

    // Add event listener to each row checkbox
    for (var i = 0; i < rowCheckboxes.length; i++) {
        rowCheckboxes[i].addEventListener("change", function() {
            if (this.checked) {
                selectedRowIds.push(this.value);
                console.log(selectedRowIds);
                IDs.value=selectedRowIds;
                delete_btn.style.display='unset';
            } else {
                var index = selectedRowIds.indexOf(this.value);
                if (index !== -1) {
                    selectedRowIds.splice(index, 1);
                }
                console.log(selectedRowIds);
                IDs.value=selectedRowIds;
                if(selectedRowIds.length ==0){
                    delete_btn.style.display='none';
                }

            }
        });
    }

    // Modify event listener for the "Select All" checkbox
    selectAllCheckbox.addEventListener("click", function() {
        if (this.checked) {
            for (var i = 0; i < rowCheckboxes.length; i++) {
                rowCheckboxes[i].checked = true;
                selectedRowIds.push(rowCheckboxes[i].value);
            }
            delete_btn.style.display='unset';
        } else {
            for (var i = 0; i < rowCheckboxes.length; i++) {
                rowCheckboxes[i].checked = false;
            }
            selectedRowIds = [];
        }
        console.log(selectedRowIds);
        IDs.value=selectedRowIds;;
        if(selectedRowIds.length ==0){
                    delete_btn.style.display='none';
        }
    });

</script>
  <!-- history -->
@endsection