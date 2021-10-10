<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Patients Ratio</div>
        </div>
        <div class="card-body">
            <div id="patients-ratio"></div>
            <script>
                var options = {
                chart: {
                height: 193,
                        type: 'donut',
                },
                        labels: ['Male', 'Female', 'Others'],
                        legend: {
                        show: false,
                        },
                        series: [{{$allMale}}, {{$allFemale}}, {{$allOthers}}],
                        stroke: {
                        width: 1,
                        },
                        colors: ['#999999', '#225de4', '#163313'],
                }
                var chart = new ApexCharts(
                        document.querySelector("#patients-ratio"),
                        options
                        );
                chart.render();

            </script>
            <!-- Row starts -->
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="info-stats3 shade-one-a">
                        <i class="icon-opacity"></i>
                        <h6>Male</h6>
                        <h3>{{$allMale}}</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="info-stats3 shade-one-b">
                        <i class="icon-opacity"></i>
                        <h6>Female</h6>
                        <h3>{{$allFemale}}</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="info-stats3 shade-one-b">
                        <i class="icon-opacity"></i>
                        <h6>Others</h6>
                        <h3>{{$allOthers}}</h3>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
    </div>
</div>
