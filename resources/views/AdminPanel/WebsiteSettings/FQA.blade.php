@extends('layouts.panel')
@section('content')
    <div class="page-content" style="padding:0% !important;">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">FQA</li>
            </ol>
        </nav>
        @include('layouts.sessions_messages')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <div style="margin-bottom: 10px;" class="d-flex flex-wrap flex-row justify-content-between align-items-center">
                        <h6 class="card-title">FQA</h6> 
                        <div>
                          <button type="button" id="btn_add_new" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New FQA
                          </button>
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
                                                        style="width: 187.837px;">Question</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 293.6px;">Answer</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 61.0375px;">Actions</th>
                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($FQAs as $FQA)
                                                <tr role="row" class="odd" id="fqa{{ $FQA->id }}">
                                                  <td class="sorting_1">{{ Str::limit($FQA->quest,60) }}</td>
                                                  <td class="sorting_1">{{ Str::limit($FQA->answer,60) }}</td>
                                                  <td>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editcategory{{$FQA->id}}">Edit</a>
                                                    <form style="padding: 0px;" class="btn btn-danger" action="{{ route('delete.fqa',$FQA->id) }}" method="POST">
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

                      @foreach($get_FQA as $FQA)
                        <!-- Starting Edit Modal -->
                          <div class="modal fade" id="editcategory{{$FQA->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $FQA->quest_en }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="POST" action="{{ route('update.fqa',$FQA->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            {{-- Disease Name AR  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Question AR</label>
                                        <input type="text" name="quest_ar" class="form-control" style="@error('quest_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $FQA->quest_ar }}">
                                        @error('quest_ar')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name AR  --}}

                                      {{-- Disease Name EN  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Question EN</label>
                                        <input type="text" name="quest_en" class="form-control" style="@error('quest_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $FQA->quest_en }}">
                                        @error('quest_en')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name EN  --}}

                                      {{-- Disease Description AR --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Answer AR</label>
                                        <input type="text" name="answer_ar" class="form-control" style="@error('answer_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $FQA->answer_ar }}">
                                        @error('answer_ar')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description AR  --}}

                                      {{-- Disease Description EN --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Answer EN</label>
                                        <input type="text" name="answer_en" class="form-control" style="@error('answer_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $FQA->answer_en }}">
                                        @error('answer_en')
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
                                      <h5 class="modal-title" id="exampleModalLabel">Add New FQA</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                            <form class="forms-sample" method="POST" action="{{ route('create.fqa') }}">
                              @csrf        
                                <div class="modal-body">
                                    {{-- Disease Name AR  --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Question AR</label>
                                      <input type="text" name="quest_ar" class="form-control" style="@error('quest_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Question AR">
                                      @error('quest_ar')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Name AR  --}}

                                    {{-- Disease Name EN  --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Question EN</label>
                                      <input type="text" name="quest_en" class="form-control" style="@error('quest_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Question EN">
                                      @error('quest_en')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Name EN  --}}

                                    {{-- Disease Description AR --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Answer AR</label>
                                      <input type="text" name="answer_ar" class="form-control" style="@error('answer_ar') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Answer AR">
                                      @error('answer_ar')
                                        <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    {{-- Disease Description AR  --}}

                                    {{-- Disease Description EN --}}
                                    <div class="form-group">
                                      <label for="exampleInputUsername1">Answer EN</label>
                                      <input type="text" name="answer_en" class="form-control" style="@error('answer_en') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Answer EN">
                                      @error('answer_en')
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
