@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.create_patient_payment_report')}}">Payment Report</a></li>
    </ol>
  </div>
  <!-- Page header end -->
  <!-- Main container start -->
  <div class="main-container">
    <div class="row gutters">
      @include('backend.pages.notify.message')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-3">
        <div class="card m-0">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="card-body">
                @include('backend.pages.users.patient-payment.components.payment-search')
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
                  <th >Date</th>
                  <th >Payment</th>
                  <th >Amount</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allResult as $key =>$value)
                  <tr>
                    <td></td>
                  <td>{{$value->date}}</td>
                    <td>
                    @if ($value->payment_id==1)
                      Cash
                    @elseif ($value->payment_id==2)
                      BKash
                    @else
                      Rocket
                    @endif
                    </td>
                    <td>{{$value->amount}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container end -->
  @endsection
