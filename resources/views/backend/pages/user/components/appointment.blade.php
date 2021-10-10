<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Appointment Date</th>
                        <th>Booking Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allAppointmentDate as $key => $value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->checkup_date}}</td>
                        <td>{{$value->booking_date}}</td>
                        <td class="text-center">
                            <a href="{{ route("backend.appointment.edit", $value->id) }}"><span class="btn btn-info btn-sm mr-1" title="View Row"><i class="icon-zoom_out_map"></i></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
