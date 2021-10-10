@extends('backend.app.index')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.create_appointment_payment_report')}}">Appointment Payment Report</a></li>
    </ol>
</div>
<div class="main-container">
    @include('backend.pages.appointment.appointment-payment.components.all-report')
    <div class="row  gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card m-0">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-body">
                            @include('backend.pages.appointment.appointment-payment.components.payment-search')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
