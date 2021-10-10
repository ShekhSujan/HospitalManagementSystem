<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allCharges as $key => $value)
                    <tr class="text-center">
                        <td>{{++$key}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->details}}</td>
                        <td>{{$value->amount}} &nbsp&nbsp
                          @if ($value->status==1)
                            <span class="badge badge-primary">Current</span>
                            @else
                                <span class="badge badge-danger">Previous</span>
                          @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
