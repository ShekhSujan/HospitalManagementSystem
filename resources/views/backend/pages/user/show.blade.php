@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.users.index')}}">All Patients List</a></li>
        <li class="breadcrumb-item"><a href="#">{{$selected->name}}</a></li>
    </ol>
</div>
<!-- Main container start -->
<div class="main-container">
    @include('backend.pages.users.components.single-report')
    @include('backend.pages.notify.message')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            @include('backend.pages.users.components.table-data')
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="Appointment-tab" data-toggle="tab" href="#Appointment" role="tab" aria-controls="Appointment" aria-selected="true"><span class="icon-activity"></span>&nbsp Appointments</a>
                        <a class="nav-item nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false"><span class="icon-activity"></span>&nbsp Payment</a>
                        <a class="nav-item nav-link" id="charges-tab" data-toggle="tab" href="#charges" role="tab" aria-controls="charges" aria-selected="false"><span class="icon-activity"></span>&nbsp Charges</a>
                        <a class="nav-item nav-link" id="balance-tab" data-toggle="tab" href="#balance" role="tab" aria-controls="balance" aria-selected="false"><span class="icon-activity"></span>&nbsp Balance</a>
                        <a class="nav-item nav-link" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="false"><span class="icon-activity"></span>&nbsp Invoices</a>
                        <a class="nav-item nav-link" id="update-info-tab" data-toggle="tab" href="#update-info" role="tab" aria-controls="update-info" aria-selected="false"><span class="icon-activity"></span>&nbsp Update</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="Appointment" role="tabpanel" aria-labelledby="Appointment-tab">
                        @include('backend.pages.users.components.appointment')
                    </div>
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        @include('backend.pages.users.components.payment')
                    </div>
                    <div class="tab-pane fade" id="charges" role="tabpanel" aria-labelledby="charges-tab">
                        @include('backend.pages.users.components.charges')
                    </div>
                    <div class="tab-pane fade" id="balance" role="tabpanel" aria-labelledby="balance-tab">
                        @include('backend.pages.users.components.balance')
                    </div>
                    <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        @include('backend.pages.users.components.invoice')
                    </div>

                    <div class="tab-pane fade" id="update-info" role="tabpanel" aria-labelledby="nav-update-info">
                        @include('backend.pages.users.components.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
<!-- #################  modal ####################-->
@include('backend.pages.users.components.delete-modal')
<!-- #################  modal ####################-->
@endsection
