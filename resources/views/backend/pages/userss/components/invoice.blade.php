<div class="main-container">
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="printableArea">
      <div class="card">
        <div class="card-body p-0">
          <div class="invoice-container printableAreas" >
            <div class="invoice-header">
              <div class="row gutters hdd">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="custom-actions-btns mb-5">
                    <a href="#" id="print" class="btn btn-primary">
                      <i class="icon-printer"></i> Print
                    </a>
                  </div>
                </div>
              </div>
              <h4 class="text-center font-weight-bold"><u>Patients Invoice</u></h4>
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
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                  <div class="invoice-details">
                    <address>
                      {{$selected->name}}&nbsp,<br/>{{$selected->email}},&nbsp{{$selected->phone}}<br />
                      {{$selected->address}}
                    </address>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                  <div class="invoice-details">
                    <div class="invoice-num">
                      <div>Invoice - #{{$selected->id}}</div>
                      <div>{{$d}}</div>
                    </div>
                  </div>
                </div>
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
                          <th>Date</th>
                          <th>Details</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($allCharges as $value)
                          <tr>
                            <td></td>
                            <td>{{$value->date}}</td>
                            <td>{{$value->details}}</td>
                            <td>{{$value->amount}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td>&nbsp;</td>
                          @if ($d==$from)
                            <td colspan="2" class="text-right border-right">**Ward & Bed Charges &nbsp&nbsp<span class="badge badge-primary">(1x{{$wardBedCharges[0]}})</span></td>
                            <td>{{$wardBedCharges[0]}}</td>
                          @else
                            <td colspan="2" class="text-right border-right">**Ward & Bed Charges &nbsp&nbsp<span class="badge badge-primary">({{$days}}x{{$wardBedCharges[0]}})</span></td>
                            <td>{{$days*$wardBedCharges[0]}}</td>
                          @endif
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td colspan="2" class="text-right border-right">
                            <p><strong>Grand Total</strong></p>
                            <p><strong>All Paid</strong></p>
                            <p class="text-danger"><strong>Balance</strong></p>
                          </td>
                          <td>
                            <p>
                              ${{$sumCharges+($days*$wardBedCharges[0])}}<br>
                            </p>
                            <p>
                              ${{$sumPayment}}<br>
                            </p>
                            <h5 class="text-danger"><strong>
                              @if (($sumCharges+($days*$wardBedCharges[0]))>$sumPayment)
                                {{$sumCharges+($days*$wardBedCharges[0])-$sumPayment}}
                                (Due)
                              @else
                                {{$sumPayment-($sumCharges+($days*$wardBedCharges[0]))}}
                                (Advance)
                              @endif
                            </strong></h5>
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
