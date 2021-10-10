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
    <div class="row  gutters">
        @include('backend.pages.notify.message')
              @if(Auth::guard('admin')->user()->p_insert==1)
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-5">
            <div class="card m-0">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New customer</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Excel File</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-header">
                            <div class="card-title">New Customer</div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('backend.customer.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gutters">
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <div class="form-group">
                                          <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Name" required>
                                      </div>
                                      <div class="form-group">
                                          <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email">
                                      </div>
                                      <div class="form-group">
                                          <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter Phone">
                                      </div>
                                      <div class="form-group">
                                          <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter Address">
                                      </div>
                                      <div class="form-group">
                                          <button type="submit"  name="submit" class="btn btn-primary btn-sm float-right">Save Customer</button>
                                      </div>
                                  </div>
                                </div>
                            </form>
                            <!-- Row end -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">   <div class="card-header">
                            <div class="card-title">Customer Excel Sheet</div>
                        </div>

                        <div class="card-body">
                            <form action="{{route('backend.customer.excel_store')}}" method="POST" enctype="multipart/form-data">
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
        @include('backend.pages.customer.table-data')
    </div>
    <!-- Row end -->
</div>

@endsection
