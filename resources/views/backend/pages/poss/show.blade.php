@extends('backend.app.index')
@section('content')
  <!-- Page header start -->
  <div class="page-header">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{route('backend.pos.index')}}">All Invoice</a></li>
    </ol>
  </div>

  <div class="main-container">
    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="printableArea">
        <div class="card" >
          <div class="card-body p-0">
            <div class="invoice-container" >
              <div class="invoice-header">

                <!-- Row start -->
                <div class="row gutters hdd">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="custom-actions-btns mb-5">
                      <a href="#" id="print" class="btn btn-primary">
                        <i class="icon-printer"></i> Print
                      </a>
                    </div>
                  </div>
                </div>
                <!-- Row end -->

                <!-- Row start -->
                <div class="row gutters">
                  @foreach ($allSetting as $value)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <a href="#" class="invoice-logo">
                        <img src="{{asset("assets/images/logo/{$value->id}-logo.{$value->logo}")}}" alt="" />
                      </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <address class="text-right">
                        {{$value->address}}<br />
                        {{$value->email}}<br />
                        {{$value->phone}}
                      </address>
                    </div>
                  @endforeach
                </div>
                <div class="row gutters">
                  @foreach ($allCustomer as $value)
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                      <div class="invoice-details">
                        <address>
                          {{$value->name}}&nbsp,{{$value->email}},&nbsp{{$value->phone}}<br />
                          {{$value->address}}
                        </address>
                      </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                      <div class="invoice-details">
                        <div class="invoice-num">
                          <div>Invoice - #{{$value->id}}</div>
                          <div>{{$value->created_at}}</div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="invoice-body">
                <div class="row gutters">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                      <table class="table custom-table css-serial">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Items</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($allOrderDetails as $value)
                            <tr>
                              <td></td>
                              <td>{{$value->title}}</td>
                              <td>{{$value->price}}</td>
                              <td>{{$value->qty}}</td>
                              <td>{{$value->total}}</td>
                            </tr>
                          @endforeach
                          <tr>
                          </tbody>
                          <tfoot>
                            <td>&nbsp;</td>
                            <td colspan="3" class="text-right border-right">
                              <p>
                                Subtotal<br>
                                Tax(15%)<br>
                              </p>
                              <h5 class="text-danger"><strong>Grand Total</strong></h5>
                            </td>
                            <td>
                              <p>
                                ${{$selected->subtotal}}<br>
                                ${{$selected->tax}}<br>
                              </p>
                              <h5 class="text-danger"><strong>${{$selected->total}}</strong></h5>
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Row end -->
              </div>
              <div class="invoice-footer">
                Thank you for being with us.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row end -->
  </div>
@endsection
