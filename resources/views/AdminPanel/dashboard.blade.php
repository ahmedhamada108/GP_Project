@extends('layouts.panel')
@section('content')
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 style="color: #b6d0ff;" class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
          {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
              <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
              <input type="text" class="form-control">
            </div>
            <button type="button" class="btn btn-outline-info btn-icon-text mr-2 d-none d-md-block">
              <i class="btn-icon-prepend" data-feather="download"></i>
              Import
            </button>
            <button type="button" class="btn btn-outline-primary btn-icon-text mr-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download Report
            </button>
          </div> --}}
        </div>

        <div class="row">

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card" style="box-shadow: 3px 0 0 #2196F3;">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0" style="color: #b6d0ff;">Patients Numbers</h6>
                </div>
                <div class="row" style="justify-content: center;position: relative;top: 20px;">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2" style="font-size: 2rem !important;color: #2196F3;">{{ $patients }}</h3>        
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card" style="box-shadow: 3px 0 0 #2196F3;">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0" style="color: #b6d0ff;">Diagnoses Numbers</h6>
                </div>
                <div class="row" style="justify-content: center;position: relative;top: 20px;">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2" style="font-size: 2rem !important;color: #2196F3;">{{ $diagnoses }}</h3>        
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 grid-margin stretch-card">
            <div class="card" style="box-shadow: 3px 0 0 #2196F3;">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline">
                  <h6 class="card-title mb-0" style="color: #b6d0ff;">Admins Numbers</h6>
                </div>
                <div class="row" style="justify-content: center;position: relative;top: 20px;">
                  <div class="col-6 col-md-12 col-xl-5">
                    <h3 class="mb-2" style="font-size: 2rem !important;color: #2196F3;">{{ $admins }}</h3>        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->
			</div>

@endsection