<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Payment Ratio</div>
        </div>
        <div class="card-body">
            <div id="payment-ratio"></div>
            <script>
                var options = {
                chart: {
                height: 193,
                        type: 'donut',
                },
                        labels: ['Cash', 'Bkash', 'Rocket'],
                        legend: {
                        show: false,
                        },
                        series: [{{$allCash}}, {{$allBkash}}, {{$allRocket}}],
                        stroke: {
                        width: 1,
                        },
                        colors: ['#999999', '#225de4', '#163313'],
                }
                var chart = new ApexCharts(
                        document.querySelector("#payment-ratio"),
                        options
                        );
                chart.render();

            </script>
            <!-- Row starts -->
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="info-stats3 shade-one-a">
                        <i class="icon-opacity"></i>
                        <h6>Cash</h6>
                        <h3>{{$allCash}}</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="info-stats3 shade-one-b">
                        <i class="icon-opacity"></i>
                        <h6>BKash</h6>
                        <h3>{{$allBkash}}</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="info-stats3 shade-one-b">
                        <i class="icon-opacity"></i>
                        <h6>Rocket</h6>
                        <h3>{{$allRocket}}</h3>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
    </div>
</div>
