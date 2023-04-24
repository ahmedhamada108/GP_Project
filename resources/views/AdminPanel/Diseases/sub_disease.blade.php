@extends('layouts.panel')
@section('content')
    <div class="page-content" style="padding:0% !important;">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sub Diseases</li>
            </ol>
        </nav>
        @include('layouts.sessions_messages')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <div style="margin-bottom: 10px;" class="d-flex flex-wrap flex-row justify-content-between align-items-center">
                        <h6 class="card-title">Sub Diseases</h6> 
                        <div>
                            <button type="button" id="btn_add_new" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Add Sub Disease
                            </button>
                            <div id="filter_sub_diseases" class="btn btn-primary">
                              <select class="form-control" id="filter">
                                <option selected="" disabled="">Select your age</option>
                                <option>Brain Stroke</option>
                                <option>Retinal OCT Diseases</option>
                                <option>Chest X-Ray</option>
                                <option>Alzheimer</option>
                              </select>
                            </div>
                        </div>
                       </div>
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
                                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 187.837px;">Main Disease</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 293.6px;">Description</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 61.0375px;">Actions</th>
                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($sub_diseases as $sub_disease)
                                                <tr role="row" class="odd" id="sub_disease{{ $sub_disease->id }}">
                                                  <td class="sorting_1">{{ $sub_disease->sub_disease }}</td>
                                                  <td class="sorting_1">{{ $sub_disease->diseases->main_disease }}</td>
                                                  <td class="sorting_1">{{ Str::limit($sub_disease->description,60) }}</td>
                                                  <td>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editcategory{{$sub_disease->id}}">Edit</a>
                                                    <form style="padding: 0px;" class="btn btn-danger" action="{{ route('delete.sub_diseases',$sub_disease->id) }}" method="POST">
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

                      @foreach($get_sub_diseases as $sub_disease)
                        <!-- Starting Edit Modal -->
                          <div class="modal fade" id="editcategory{{$sub_disease->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $sub_disease->sub_disease_en }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.sub_diseases',$sub_disease->id) }}">
                                            @csrf
                                            @method('put')
                                      {{-- Disease Name AR  --}}
                                          <div class="form-group">
                                            <label for="exampleInputUsername1">Sub Diseases Name AR</label>
                                            <input type="text" name="sub_disease_ar" class="form-control" style="@error('sub_disease_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $sub_disease->sub_disease_ar }}">
                                            @error('sub_disease_ar')
                                              <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                            @enderror
                                          </div>
                                      {{-- Disease Name AR  --}}

                                      {{-- Disease Name EN  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Diseases Name EN</label>
                                        <input type="text" name="sub_disease_en" class="form-control" style="@error('sub_disease_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $sub_disease->sub_disease_en }}">
                                        @error('sub_disease_en')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name EN  --}}

                                      {{-- Disease Description AR --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Sub Diseases Description AR</label>
                                        <input type="text" name="description_ar" class="form-control" style="@error('description_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $sub_disease->description_ar }}">
                                        @error('description_ar')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description AR  --}}

                                      {{-- Disease Description EN --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Sub Diseases Description EN</label>
                                        <input type="text" name="description_en" class="form-control" style="@error('description_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $sub_disease->description_en }}">
                                        @error('description_en')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description EN  --}}

                                      {{-- Main Disease --}}
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect1">The Main Disease</label>
                                        <select name="disease_id" class="form-control" id="exampleFormControlSelect1">
                                          @foreach($diseases as $disease)    
                                            <option value="{{ $disease->id }}" {{$disease->id==$sub_disease->diseases->id ? 'selected' : ''}} >{{$disease->disease_name}}</option>
                                          @endforeach
                                        </select> 
                                        @error('image')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Main Disease  --}}

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
                                      <h5 class="modal-title" id="exampleModalLabel">Add New Sub Disease</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                            <form class="forms-sample" method="POST" action="{{ route('create.sub_diseases') }}"  enctype="multipart/form-data">
                              @csrf        
                                <div class="modal-body">
                                    {{-- Disease Name AR  --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Sub Diseases Name AR</label>
                                      <input type="text" name="sub_disease_ar" class="form-control" style="@error('sub_disease_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Name AR">
                                      @error('sub_disease_ar')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Name AR  --}}

                                    {{-- Disease Name EN  --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Name EN</label>
                                      <input type="text" name="sub_disease_en" class="form-control" style="@error('sub_disease_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Name EN">
                                      @error('sub_disease_en')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Name EN  --}}

                                    {{-- Disease Description AR --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Description AR</label>
                                      <input type="text" name="description_ar" class="form-control" style="@error('description_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Description AR">
                                      @error('description_ar')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Description AR  --}}

                                    {{-- Disease Description EN --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Diseases Description EN</label>
                                      <input type="text" name="description_en" class="form-control" style="@error('description_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Diseases Description EN">
                                      @error('description_en')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Description EN  --}}

                                    {{-- Disease Description EN --}}
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">The Main Disease</label>
                                        <select name="disease_id" class="form-control" id="exampleFormControlSelect1">
                                          @foreach($diseases as $diseases)    
                                            <option value="{{ $diseases->id }}">{{$diseases->disease_name}}</option>
                                          @endforeach
                                        </select> 
                                        @error('disease_id')
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
