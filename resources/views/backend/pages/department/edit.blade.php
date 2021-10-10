@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.department.create')}}">Department</a></li>
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
                    <div class="card-title">Update Department</div>
                </div>
                <div class="card-body">
                    <form  action="{{ route('backend.department.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $selected->id }}">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Department</label>
                                    <textarea name="title" class="form-control" placeholder="Enter department Title" required>{{ $selected->title }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputSubject" class="col-form-label">Status</label>
                                    <select name="status" class="form-control">
                                        @if ($selected->status == 1)
                                        <option selected value="1"> Approved</option>
                                        <option value="0"> Pending</option>
                                        @else
                                        <option  value="1"> Approved</option>
                                        <option selected value="0"> Pending</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm-update">Update department</button>
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
        @include('backend.pages.department.table-data')
    </div>
</div>
<!-- Main container end -->
@endsection
