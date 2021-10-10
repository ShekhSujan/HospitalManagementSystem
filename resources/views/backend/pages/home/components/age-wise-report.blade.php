<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Patient By Age</div>
        </div>
        <div class="card-body">
            <div id="xLabelsDiagonally" class="chart-height"></div>
            <script>
            var day_data = [
              @foreach($allAgeWiseReport as $item)
              {"Age": "{{$item->range}}", "Male": {{$item->Male}}, "Female": {{$item->Female}}, "Others": {{$item->Others}}},
              @endforeach
            ];
                Morris.Bar({
                element: 'xLabelsDiagonally',
                        data: day_data,
                        xkey: 'Age',
                        ykeys: ['Male', 'Female', 'Others'],
                        labels: ['Male', 'Female', 'Others'],
                        xLabelAngle: 45,
                        gridLineColor: "#e1e5f1",
                        resize: true,
                        hideHover: "auto",
                        barColors:['#aa0000', '#cc0000', '#ee0000', '#ff3333', '#ff7777'],
                });
            </script>
        </div>
    </div>
</div>
