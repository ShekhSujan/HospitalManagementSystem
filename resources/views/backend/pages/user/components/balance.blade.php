<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr class="">
            <td>Medicine & Others Charges</td>
            <td>{{$sumCharges}}</td>
          </tr>
          <tr>
            @if ($d==$from)
              <td>Ward & Bed Charges &nbsp&nbsp<span class="badge badge-primary">(1x{{$wardBedCharges[0]}})</span></td>
              <td>{{1*$wardBedCharges[0]}}</td>
            @else
              <td>Ward & Bed Charges &nbsp&nbsp<span class="badge badge-primary">({{$days}}x{{$wardBedCharges[0]}})</span></td>
              <td>{{$days*$wardBedCharges[0]}}</td>
            @endif

          </tr>
          <tr>
            <td>Total Payment</td>
            <td>{{$sumPayment}}</td>
          </tr>
          <tr>
            <td class="font-weight-bold">SubTotal</td>
            <td>
              @if (($sumCharges+($days*$wardBedCharges[0]))>$sumPayment)
                {{$sumCharges+($days*$wardBedCharges[0])-$sumPayment}}
                (Due)
              @else
                {{$sumPayment-($sumCharges+($days*$wardBedCharges[0]))}}
                (Advance)
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
