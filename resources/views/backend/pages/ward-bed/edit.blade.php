@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.ward-bed.create')}}">Ward-Bed</a></li>
    </ol>
  </div>
  <!-- Page header end -->
  <!-- Main container start -->
  <div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
      @include('backend.pages.notify.message')
      @if(Auth::guard('admin')->user()->p_update==1)
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
          <div class="card m-0">
            <div class="card-header">
              <div class="card-title">Update Ward-Bed</div>
            </div>
            <div class="card-body">
              <form  action="{{ route('backend.ward-bed.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $selected->id }}">
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <input type="text" name="title" class="form-control" value="{{$selected->title}}" placeholder="Enter Ward Title" required/>
                    </div>
                    <div class="form-group">
                      <input type="number" name="bed" class="form-control" value="{{$selected->bed}}" placeholder="Enter Bed" required/>
                    </div>
                    <div class="form-group">
                      <input type="number" name="charge" class="form-control" value="{{$selected->charge}}" placeholder="Enter Daily Charge" required/>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update Advice</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ################# Small modal ####################-->
                @include('backend.pages.modal.update-modal')
                <!-- Main container end -->
              </form>
              <!-- Row end -->
            </div>
          </div>
        </div>
      @endif
      @include('backend.pages.ward-bed.table-data')
    </div>
  </div>
  <!-- Main container end -->
@endsection
