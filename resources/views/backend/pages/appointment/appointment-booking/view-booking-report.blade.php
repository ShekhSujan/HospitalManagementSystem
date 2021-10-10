@extends('backend.app.index')
@section('content')
<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.create_appointment_booking_report')}}">Report</a></li>
    </ol>
</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">
    @include('backend.pages.appointment.appointment-booking.components.all-report')
    <div class="row gutters">
        @include('backend.pages.notify.message')
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-3">
            <div class="card m-0">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card-body">
                            @include('backend.pages.appointment.appointment-booking.components.booking-search')
                            <!-- Row end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="table-container" id="statusa">
                <div class="table-responsive">
            <table id="print-table1" class="table custom-table @if (count($allResult)>0) css-serial @endif">
                        <thead>
                            <tr>
                                <th >SL:</th>
                                <th >Name</th>
                                <th >Phone</th>
                                <th >Booking</th>
                                <th >Checkup</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allResult as $key =>$value)
                            <tr>
                                <td></td>
                                <td>{{$value->user_name}}</td>
                                <td>{{$value->user_phone}}</td>
                                <td>{{$value->booking_date}}</td>
                                <td>{{$value->checkup_date}}</td>

                                <td>
                                  @if($value->status==2)
                                    <span class="btn btn-success btn-sm" title="Approved"><i class="icon-toggle-right"></i></span>
                                  @elseif($value->status==1)
                                    <span class="btn btn-warning btn-sm" title="Cancled"><i class="icon-toggle-left"></i></span>
                                  @else
                                    <span class="btn btn-secondary btn-sm" title="Pending"><i class="icon-toggle-left"></i></span>
                                  @endif
                                  @if(Auth::guard('admin')->user()->p_update==1)
                                    <a href="{{ route("backend.appointment.edit", $value->id) }}" title="Edit Row"><span class="btn btn-warning btn-sm"><i class="icon-edit1"></i></span></a>
                                  @endif
                                  @if(Auth::guard('admin')->user()->p_delete==1)
                                    <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                                  @endif
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                    <!-- ################# Small modal ####################-->
                    @include('backend.pages.appointment.components.delete-modal')
                    @include('backend.pages.appointment.components.disable-modal')
                    <!-- Main container end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main container end -->
@endsection
