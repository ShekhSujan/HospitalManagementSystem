@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.customer.create')}}">Customer</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
      @include('backend.pages.notify.message')
            @if(Auth::guard('admin')->user()->p_update==1)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5">
            <div class="card m-0">
                <div class="card-header">
                    <div class="card-title">Update Customer</div>
                </div>
                <div class="card-body">
                    <form  action="{{ route('backend.customer.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $selected->id }}">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <div class="form-group">
                                  <input type="text" name="name" class="form-control" value="{{ $selected->name }}" placeholder="Enter Name" required>
                              </div>
                              <div class="form-group">
                                  <input type="text" name="email" class="form-control" value="{{ $selected->email }}" placeholder="Enter Email">
                              </div>
                              <div class="form-group">
                                  <input type="text" name="phone" class="form-control" value="{{ $selected->phone }}" placeholder="Enter Phone">
                              </div>
                              <div class="form-group">
                                  <input type="text" name="address" class="form-control" value="{{ $selected->address }}" placeholder="Enter Address">
                              </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update customer</button>
                                </div>
                                <!-- ################# Small modal ####################-->
                                @include('backend.pages.modal.update-modal')
                                <!-- Main container end -->
                            </div>
                    </form>
                    <!-- Row end -->
                </div>
            </div>
        </div>
    </div>
  @endif
    @include('backend.pages.customer.table-data')
</div>
</div>
<!-- Main container end -->
@endsection
