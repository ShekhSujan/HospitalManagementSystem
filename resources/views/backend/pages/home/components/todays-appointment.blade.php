<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container" id="statusa">
            <div class="t-header">Today's Appointment</div>
            <div class="table-responsive">
                <table id="print-table1" class="table custom-table @if (count($allTodaysAppointment)>0) css-serial @endif">
                    <thead>
                        <tr>
                            <th >SL:</th>
                            <th >Name</th>
                            <th >Phone</th>
                            <th >Booking</th>
                            <th >Checkup</th>
                            <th >Type</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allTodaysAppointment as $key =>$value)
                        <tr>
                            <td></td>
                            <td>{{$value->user_name}}</td>
                            <td>{{$value->user_phone}}</td>
                            <td>{{$value->date}}&nbsp/&nbsp{{date('h:i A', strtotime($value->booking_date))}}</td>
                            <td>{{$value->checkup_date}}</td>
                            <td>
                              @if ($value->type==1)
                                  <span class="badge badge-info">General</span>
                                @else
                                    <span class="badge badge-primary">Video</span>
                              @endif
                            </td>
                            <td>
                                @if($value->status==2)
                                <span class="btn btn-success btn-sm" title="Approved"><i class="icon-toggle-right"></i></span>
                                @elseif($value->status==1)
                                <span class="btn btn-warning btn-sm" title="Cancled"><i class="icon-toggle-left"></i></span>
                                @else
                                <span class="btn btn-secondary btn-sm" title="Pending"><i class="icon-toggle-left"></i></span>
                                @endif
                                <a href="{{ route("backend.appointment.edit", $value->id) }}" title="Edit Row"><span class="btn btn-warning btn-sm"><i class="icon-edit1"></i></span></a>
                                <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
                            </td>
                          </tr>
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
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container" id="statusa1">
            <div class="t-header">Today's Booking</div>
            <div class="table-responsive">
                <table id="print-table2" class="table custom-table ">
                    <thead>
                        <tr>
                            <th >SL:</th>
                            <th >Name</th>
                            <th >Phone</th>
                            <th >Booking</th>
                            <th >Checkup</th>
                            <th >Type</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody class="@if (count($allTodaysBooking)>0) second-table @endif">
                        @foreach($allTodaysBooking as $key =>$value)
                        <tr>
                            <td></td>
                            <td>{{$value->user_name}}</td>
                            <td>{{$value->user_phone}}</td>
                            <td>{{$value->date}}&nbsp/&nbsp{{date('h:i A', strtotime($value->booking_date))}}</td>
                            <td>{{$value->checkup_date}}</td>
                            <td>
                              @if ($value->type==1)
                                  <span class="badge badge-info">General</span>
                                @else
                                    <span class="badge badge-primary">Video</span>
                              @endif
                            </td>
                            <td>
                                @if($value->status==2)
                                <span class="btn btn-success btn-sm" title="Approved"><i class="icon-toggle-right"></i></span>
                                @elseif($value->status==1)
                                <span class="btn btn-warning btn-sm" title="Cancled"><i class="icon-toggle-left"></i></span>
                                @else
                                <span class="btn btn-secondary btn-sm" title="Pending"><i class="icon-toggle-left"></i></span>
                                @endif
                                <a href="{{ route("backend.appointment.edit", $value->id) }}" title="Edit Row"><span class="btn btn-warning btn-sm"><i class="icon-edit1"></i></span></a>
                                <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$value->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="modalview(this.id)" title="Delete Row"><i class="icon-x"></i></button>
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
