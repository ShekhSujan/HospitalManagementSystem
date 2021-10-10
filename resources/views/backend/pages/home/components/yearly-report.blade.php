

<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Yearly Patients Report</div>
        </div>
        <div class="card-body pt-0">
            <div id="Patients"></div>
            <script>
          var options = {
            chart: {
              height: 280,
              type: 'bar',
              stacked: true,
              toolbar: {
                show: false
              },
              zoom: {
                enabled: true
              }
            },
            plotOptions: {
              bar: {
                horizontal: false,
                columnWidth: '20%',
              },
            },
            dataLabels: {
              enabled: true
            },
            series: [{
              name: 'Patients',
              data: [
                @foreach($allYearlyReport as $item)
                  {{ $item->count }}
                  @if (!$loop->last)
                  ,
                  @else
                  ,0
                  @endif
                  @endforeach
                ]
            }],
            xaxis: {
              type: 'month',
              categories: [
                @foreach($allYearlyReport as $item)
                  '{{ $item->monthname }}'
                  @if (!$loop->last)
                  ,
                  @endif
                  @endforeach
              ],
            },
            legend: {
              offsetY: -7
            },
            fill: {
              opacity: 1
            },
            // colors: ['#2f8a00', '#074694'],
            colors: ['#074694', '#2f8a00'],
            tooltip: {
              y: {
                formatter: function(val) {
                  return  "Patients " + val + ""
                }
              }
            },
          }
          var chart = new ApexCharts(
            document.querySelector("#Patients"),
            options
          );
          chart.render();
          </script>

        </div>
    </div>
</div>
