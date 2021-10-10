@extends('backend.app.index')
@section('content')
    @if(Auth::guard('admin')->user()->p_update==1)
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.appointment.index')}}">All appointments</a></li>
    </ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            @include('backend.pages.appointment.components.patient-details')
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-Info-tab" data-toggle="tab" href="#nav-Info" role="tab" aria-controls="nav-Info" aria-selected="true"><span class="icon-activity"></span>&nbsp Info</a>
                        <a class="nav-item nav-link" id="nav-Update-Info-tab" data-toggle="tab" href="#nav-Update-Info" role="tab" aria-controls="nav-Update-Info" aria-selected="true"><span class="icon-activity"></span>&nbsp Update-Info</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($allAppointment as $value)
                    <div class="tab-pane fade show active" id="nav-Info" role="tabpanel" aria-labelledby="nav-Info-tab">
                        @include('backend.pages.appointment.components.info')
                    </div>
                    @endforeach
                    <div class="tab-pane fade" id="nav-Update-Info" role="tabpanel" aria-labelledby="nav-Update-Info-tab">
                        @include('backend.pages.appointment.components.update-info')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
@else
<script>window.location = "{{ route('backend.unauthorized') }}";</script>
@endif
@endsection
