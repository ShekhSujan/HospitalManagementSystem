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
    <div class="row  gutters">
        @include('backend.pages.notify.message')
                @if(Auth::guard('admin')->user()->p_insert==1)
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
            <div class="card m-0">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">   <div class="card-header">
                            <div class="card-title">New Ward-Bed</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('backend.ward-bed.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Ward Title" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="bed" class="form-control" value="{{ old('bed') }}" placeholder="Enter Bed" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="charge" class="form-control" value="{{ old('charge') }}" placeholder="Enter Daily Charge" required/>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit"  name="submit" class="btn btn-primary btn-sm float-right">Save Ward-Bed</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endif
        @include('backend.pages.ward-bed.table-data')
    </div>
    <!-- Row end -->
</div>
<!-- Main container end -->
@endsection
