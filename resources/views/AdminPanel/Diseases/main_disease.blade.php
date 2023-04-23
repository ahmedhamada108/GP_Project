@extends('layouts.panel')
@section('content')
    <div class="page-content" style="padding:0% !important;">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Main Diseases</li>
            </ol>
        </nav>
        @include('layouts.sessions_messages')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Main Diseases</h6>
                        {{-- Add New Disease Button  --}}
                        <button type="button" id="btn_add_new" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Add New Disease
                        </button>
                        {{-- Add New Disease Button  --}}
                        <br><br>
                      {{-- Table  --}}
                        <div class="table-responsive">
                            <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="dataTableExample" class="table dataTable no-footer" role="grid"
                                            aria-describedby="dataTableExample_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 187.837px;">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 293.6px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 134.512px;">Image</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 61.0375px;">Actions</th>
                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($diseases as $disease)
                                                <tr role="row" class="odd" id="diseases{{ $disease->id }}">
                                                  <td class="sorting_1">{{ $disease->disease_name }}</td>
                                                  <td class="sorting_1">{{ Str::limit($disease->diseases_description,60) }}</td>
                                                  <td>
                                                    <img src="{{ $disease->image }}" alt="" style="width: 40px; border-radius: 50%;">
                                                  </td>
                                                  <td>
                                                    <a href="{{route('show.main_diseases',$disease->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#editcategory{{$disease->id}}">Edit</a>
                                                    <form style="padding: 0px;" class="btn btn-danger" action="{{ route('delete.main_diseases',$disease->id) }}" method="POST">
                                                      @csrf
                                                      @method('delete')
                                                      <button type="submit" class="btn btn-danger" >Delete</button>
                                                    </form>
                                                  </td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                      {{-- Finish Table  --}}

                      @foreach($get_diseases as $disease)
                        <!-- Starting Edit Modal -->
                          <div class="modal fade" id="editcategory{{$disease->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $disease->diseases_name_en }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.main_diseases',$disease->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            {{-- Disease Name AR  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Diseases Name AR</label>
                                        <input type="text" name="diseases_name_ar" class="form-control" style="@error('diseases_name_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $disease->diseases_name_ar }}">
                                        @error('diseases_name_ar')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name AR  --}}

                                      {{-- Disease Name EN  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Diseases Name EN</label>
                                        <input type="text" name="diseases_name_en" class="form-control" style="@error('diseases_name_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $disease->diseases_name_en }}">
                                        @error('diseases_name_en')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name EN  --}}

                                      {{-- Disease Description AR --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Diseases Description AR</label>
                                        <input type="text" name="diseases_description_ar" class="form-control" style="@error('diseases_description_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $disease->diseases_description_ar }}">
                                        @error('diseases_description_ar')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description AR  --}}

                                      {{-- Disease Description EN --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Diseases Description EN</label>
                                        <input type="text" name="diseases_description_en" class="form-control" style="@error('diseases_description_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $disease->diseases_description_en }}">
                                        @error('diseases_description_en')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description EN  --}}

                                      {{-- Disease Description EN --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Diseases Image</label>
                                        <input type="file" accept="image/*" name="image" class="form-control" style="@error('image') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Image">
                                        @error('image')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description EN  --}}

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                        {{-- Finish Edit model  --}}
                      @endforeach

                      <!-- Starting Add Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Add New Main Disease</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                            <form class="forms-sample" method="POST" action="{{ route('create.main_diseases') }}"  enctype="multipart/form-data">
                              @csrf        
                                <div class="modal-body">
                                    {{-- Disease Name AR  --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Name AR</label>
                                      <input type="text" name="diseases_name_ar" class="form-control" style="@error('diseases_name_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Name AR">
                                      @error('diseases_name_ar')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Name AR  --}}

                                    {{-- Disease Name EN  --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Name EN</label>
                                      <input type="text" name="diseases_name_en" class="form-control" style="@error('diseases_name_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Name EN">
                                      @error('diseases_name_en')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Name EN  --}}

                                    {{-- Disease Description AR --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Description AR</label>
                                      <input type="text" name="diseases_description_ar" class="form-control" style="@error('diseases_description_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Description AR">
                                      @error('diseases_description_ar')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Description AR  --}}

                                    {{-- Disease Description EN --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Description EN</label>
                                      <input type="text" name="diseases_description_en" class="form-control" style="@error('diseases_description_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Description EN">
                                      @error('diseases_description_en')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Description EN  --}}

                                    {{-- Disease Description EN --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Image</label>
                                      <input type="file" accept="image/*" name="image" class="form-control" style="@error('image') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Image">
                                      @error('image')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Description EN  --}}
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>  
                          </div>
                      {{-- Finish Add model  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
