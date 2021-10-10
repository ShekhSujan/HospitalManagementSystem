<!-- Row start -->
<div class="row gutters justify-content-center">
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Patient['todaysPatient']}}</h6>
                <p>Today</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Patient['last7DaysPatient']}}</h6>
                <p>Week</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Patient['last30DaysPatient']}}</h6>
                <p>Month</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Patient['pendingPatient']}}</h6>
                <p>Pending</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Patient['approvedPatient']}}</h6>
                <p>Approved</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Patient['pendingPatient'] + $Patient['approvedPatient']}}</h6>
                <p>All</p>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
