@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.create_payment_report')}}">Payment Report</a></li>
    </ol>
  </div>
  <div class="main-container">
    <div class="row  gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
              <div class="tab-content">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="card-body">
                        <form action="{{route('backend.create_payment_report')}}" method="get" enctype="multipart/form-data">
                            <div class="row gutters justify-content-center">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-right">
                                    <label for="inputSubject" class="col-form-label pr-3">Date Range:</label>
                                    <a href="#" id="reportrange">
                                        <span class="range-text"></span>
                                        <i class="icon-chevron-down pr-3"></i>
                                    </a>
                                    <input type="hidden" id="s" name="start_date"/>
                                    <input type="hidden" id="e" name="end_date"/>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 pt-1">
                                      <label for="inputSubject" class="col-form-label pr-3">Appointment Type:</label>
                                    <select name="type_id">
                                      <option value="">-Select Type-</option>
                                      <option value="1">General Appointment</option>
                                      <option value="2">Video Appointment</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 pt-1">
                                  <label for="inputSubject" class="col-form-label pr-3">Payment Mathod:</label>
                                    <select name="payment_id">
                                        <option value="">-Select Method-</option>
                                        <option value="1"> Cash</option>
                                        <option value="2"> M-Banking</option>
                                        <option value="3"> BankTransfer</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm px-3 mx-2 mb-1"><i class="icon-export"></i></button>
                                </div>
                            </div>
                        </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
  @isset($allResult)
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container" id="statusa">
            <div class="table-responsive">
              <table id="print-table1" class="table custom-table @if (count($allResult)>0) css-serial @endif">
                    <thead>
                        <tr>
                            <th >SL:</th>
                            <th >Date</th>
                            <th >Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allResult as $key =>$value)
                        <tr>
                            <td></td>
                            <td>{{$value->date}}</td>
                            <td>{{$value->amount}}</td>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  @endisset
</div>
</div>
@endsection
