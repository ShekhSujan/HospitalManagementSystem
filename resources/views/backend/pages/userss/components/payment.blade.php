<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allPayment as $key => $value)
                    <tr class="text-center">
                        <td>{{++$key}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->amount}} &nbsp&nbsp
                          @if ($value->status==1)
                            <span class="badge badge-primary">Current</span>
                            @else
                                <span class="badge badge-danger">Previous</span>
                          @endif
                        </td>
                        <td>
                        @if ($value->type==1)
                          <span class="badge badge-primary">Cash</span>
                        @elseif($value->type==2)
                            <span class="badge badge-primary">BKash</span>
                          @else
                              <span class="badge badge-primary">Rocket</span>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
