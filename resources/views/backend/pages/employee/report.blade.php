@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.employee.index')}}">All Employee</a></li>
    </ol>
  </div>
  <!-- Page header end -->
  <!-- Main container start -->
  <div class="main-container">
    <div class="row gutters">
      @include('backend.pages.notify.message')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-3">
        <div class="card m-0">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="card-body">
                <form action="{{route('backend.employee.report.view')}}" method="get" enctype="multipart/form-data">
                  {{-- @csrf --}}
                  <div class="row gutters justify-content-center">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12 text-right">
                      <label for="inputSubject" class="col-form-label pr-3">Employee Report:</label>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-right">
                      <div class="form-group">
                        <select name="department" class="form-control" >
                          <option value="">Select Department</option>
                          @foreach($allDepartment as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 text-right">
                      <div class="form-group">
                        <select name="designation" class="form-control" >
                          <option value="">Select Designation</option>
                          @foreach($allDesignation as $value)
                            <option value="{{$value->id}}">{{$value->title}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 pt-1">
                      <button type="submit" class="btn btn-primary btn-sm px-3 mx-2 mb-1"><i class="icon-export"></i></button>
                    </div>
                  </div>
                </form>
                <!-- Row end -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <br/>
      </div>
    </div>
    <!-- Main container end -->
  @endsection
