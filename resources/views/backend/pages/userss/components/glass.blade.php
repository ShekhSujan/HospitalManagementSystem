<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Prescribe ID</th>
                        <th>Date</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allGlassPrescription as $key => $value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$value->id}}</td>
                        <td>{{date('Y-m-d', strtotime($value->created_at))}}</td>
                        <td>
                            <a href="{{ route("backend.glass-prescription.view", $value->id) }}"><span class="btn btn-info btn-sm mr-1" title="View Row"><i class="icon-zoom_out_map"></i></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
