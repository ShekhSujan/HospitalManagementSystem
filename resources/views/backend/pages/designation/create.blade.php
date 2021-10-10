@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.designation.create')}}">Designation</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container" >
    <!-- Row start -->
    <div class="row  gutters">
        @include('backend.pages.notify.message')
                      @if(Auth::guard('admin')->user()->p_insert==1)
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card m-0">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Designation</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Excel File</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">   <div class="card-header">
                            <div class="card-title">New Designation</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('backend.designation.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <textarea name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Designation" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"  name="submit" class="btn btn-primary btn-sm float-right">Save Designation</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Row end -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">   <div class="card-header">
                            <div class="card-title">Designation Excel Sheet</div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('backend.designation.excel_store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="file" name="file" class="form-control"  required/>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"  name="submit" class="btn btn-primary btn-sm float-right">Upload File</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Row end -->
                        </div></div>
                </div>
            </div>
        </div>
      @endif
        @include('backend.pages.designation.table-data')
    </div>
    <!-- Row end -->
</div>
<!-- Main container end -->
@endsection
