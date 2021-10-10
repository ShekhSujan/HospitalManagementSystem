<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Top Uages Medicine</div>
        </div>
        <div class="card-body">
            <div class="customScroll5">
                <div class="activity-logs pr-3">
                    @foreach ($allTopMedicine as $value)
                    <div class="activity-log-list">
                        <div class="sts"></div>
                        <div class="log">{{$value->medicine_title}}</div>
                        <div class="log-time">{{$value->count}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
