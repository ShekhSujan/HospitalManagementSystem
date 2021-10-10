<!-- Row start -->
<div class="row gutters justify-content-center">
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Appointment['todaysAppointment']}}</h6>
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
                <h6>{{$Appointment['last7DaysAppointment']}}</h6>
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
                <h6>{{$Appointment['last30DaysAppointment']}}</h6>
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
                <h6>{{$Appointment['pendingAppointment']}}</h6>
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
                <h6>{{$Appointment['approvedAppointment']}}</h6>
                <p>Completed</p>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="info-stats4">
            <div class="info-icon icn-size">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h6>{{$Appointment['cancledAppointment']}}</h6>
                <p>Cancled</p>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
