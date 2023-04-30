@extends('layouts.panel')
@section('content')
    <div class="page-content" style="padding:0% !important;">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">admins Management</li>
            </ol>
        </nav>
        @include('layouts.sessions_messages')
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <div style="margin-bottom: 10px;" class="d-flex flex-wrap flex-row justify-content-between align-items-center">
                        <h6 class="card-title">admins Management</h6> 
                        <div>
                          <button type="button" id="btn_add_new" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New admin
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
                                                        style="width: 187.837px;">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 293.6px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTableExample"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 61.0375px;">Actions</th>
                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($admins as $admin)
                                                <tr role="row" class="odd" id="diseases{{ $admin->id }}">
                                                  <td class="sorting_1">{{ $admin->name }}</td>
                                                  <td class="sorting_1">{{ $admin->email }}</td>
                                                  <td>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editcategory{{$admin->id}}">Edit</a>
                                                    <form style="padding: 0px;" class="btn btn-danger" action="{{ route('delete.admins',$admin->id) }}" method="POST">
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

                      @foreach($admins as $admin)
                        <!-- Starting Edit Modal -->
                          <div class="modal fade" id="editcategory{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $admin->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('update.admins',$admin->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                      {{-- Disease Name AR  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">admin Name</label>
                                        <input type="text" name="name" class="form-control" style="@error('name') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $admin->name }}">
                                        @error('name')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name AR  --}}

                                      {{-- Disease Name EN  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">admin Email</label>
                                        <input type="email" name="email" class="form-control" style="@error('email') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off" value="{{ $admin->email }}">
                                        @error('email')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name EN  --}}

                                      {{-- Disease Description AR --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Password</label>
                                        <input type="password" name="password" class="form-control" style="@error('password') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off">
                                        @error('password')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description AR  --}}

                                      {{-- Disease Description EN --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Confiramtion Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" style="@error('password_confirmation') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off">
                                        @error('password_confirmation')
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
                                      <h5 class="modal-title" id="exampleModalLabel">Add admin</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                            <form class="forms-sample" method="POST" action="{{ route('create.admins') }}"  enctype="multipart/form-data">
                              @csrf        
                                <div class="modal-body">
                                      {{-- Disease Name AR  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">admin Name</label>
                                        <input type="text" name="name" class="form-control" style="@error('name') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off">
                                        @error('name')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name AR  --}}

                                      {{-- Disease Name EN  --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">admin Email</label>
                                        <input type="email" name="email" class="form-control" style="@error('email') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off">
                                        @error('email')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Name EN  --}}

                                      {{-- Disease Description AR --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Password</label>
                                        <input type="password" name="password" class="form-control" style="@error('password') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off">
                                        @error('password')
                                          <p class="help is-danger" style="color: #dc3545; padding-bottom: 9px;">{{ $message }}</p>
                                        @enderror
                                      </div>
                                      {{-- Disease Description AR  --}}

                                      {{-- Disease Description EN --}}
                                      <div class="form-group">
                                        <label for="exampleInputUsername1">Confiramtion Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" style="@error('password_confirmation') border-bottom: 1px solid #dc3545 !important; @enderror" id="exampleInputUsername1" autocomplete="off">
                                        @error('password_confirmation')
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
