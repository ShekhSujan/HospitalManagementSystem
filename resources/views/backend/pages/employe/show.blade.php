@extends('backend.app.index')
@section('content')
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.employee.index')}}">Employee</a></li>
      <li class="breadcrumb-item"><a href="#">{{$selected->name}}</a></li>
    </ol>
  </div>
  <div class="main-container">
    @include('backend.pages.notify.message')
    <div class="row gutters">
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        @include('backend.pages.employee.components.table-data')
      </div>
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="Appointment-tab" data-toggle="tab" href="#Appointment" role="tab" aria-controls="Appointment" aria-selected="true"><span class="icon-activity"></span>&nbsp Others Details</a>
                <a class="nav-item nav-link" id="nav-Info-tab" data-toggle="tab" href="#nav-Info" role="tab" aria-controls="nav-Info" aria-selected="false"><span class="icon-activity"></span>&nbsp Update Info</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="Appointment" role="tabpanel" aria-labelledby="Appointment-tab">
                @include('backend.pages.employee.components.others-details')
              </div>
              <div class="tab-pane fade" id="nav-Info" role="tabpanel" aria-labelledby="nav-Info-tab">
                @include('backend.pages.employee.components.update-info')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
