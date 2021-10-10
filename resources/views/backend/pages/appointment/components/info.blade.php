<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm">
                <tbody>
                <h5>Appointment Details:<h5>
                        <tr>
                            <td class="font-weight-bold">Doctor Name:</td>
                            <td>{{$value->doctor_name}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Appointment Type:</td>
                            <td>{{$value->speciality_title}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Booking Date:</td>
                            <td>{{$value->booking_date}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Checkup Date:</td>
                            <td>{{$value->checkup_date}}</td>
                        </tr>
                        </tbody>
                        </table>
                        <table class="table table-hover table-bordered table-sm">
                            <tbody>
                            <h5>Additional Details:<h5>
                                    <tr>
                                        <td class="font-weight-bold">Appointment Status:</td>
                                        @if($value->status==2)
                                        <td> <span class="badge badge-success">Approved</span></td>
                                        @elseif($value->status==1)
                                        <td><span class="badge badge-warning">Cancled</span></td>
                                        @else
                                        <td> <span class="badge badge-danger">Pending</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Payment:</td>
                                        @if($value->payment_id==1)
                                        <td>Cash</td>
                                        @elseif($value->payment_id==2)
                                        <td>Bkash</td>
                                        @else
                                        <td>Rocket</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Amount:</td>
                                        <td>{{$value->amount}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Remarks:</td>
                                        <td>{{$value->remarks}}</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    </div>
