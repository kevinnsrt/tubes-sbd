<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script src="{{ asset('apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <link rel="stylesheet"  href="{{asset('apexcharts-bundle/dist/apexcharts.css')}}"/>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class=" font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

            <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="chart"></div>
              </div>

            <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="lastrun"></div>
              </div>

              <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="totalDataCompetitions"></div>
              </div>

              <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="participants"></div>
              </div>

              <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="averagedownloads"></div>
              </div>

              <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="averageviews"></div>
              </div>

              <div class="card w-full bg-gray-50 shadow-xl">
                <div class="card-body">
                    <div id="averageusability"></div>
              </div>








    </x-app-layout>
{{-- grafik 1 start --}}
    <script>
        var options = {
          series: [{
            data: [{{ $totalUsers }},{{ $totalDataset }},{{ $totalModel }},{{ $totalCompetitions }},{{ $totalData }}]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              borderRadius: 4,
              horizontal: false,
            }
          },
          grid:{
        row:{
            colors: ['#2B908F', '#4ECDC4']
        }
        },
        fill:{
            colors:['#546E7A'],
        },
          dataLabels: {
            enabled:false
          },
          xaxis: {
            categories: ['Total Users','Total Dataset','Total Model','Total Competitions','Total Data']
          }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      </script>
{{-- grafik 1 end --}}

{{-- grafik 2 start --}}
    <script>
    var options = {
        series: [{
            name: 'Total Models',
            data: {!! json_encode(array_column($LastRunDate, 'y'))!!},
            stroke:{
                colors:['	#FF4560']
            }
        }],
        chart: {
            type: 'area',
            stacked: false,
            height: 350,
            zoom: {
                type: 'x',
                enabled: true,
                autoScaleYaxis: true
            },

            toolbar: {
                autoSelected: 'zoom'
            }
        },
        dataLabels: {
            colors:['#FF4560'],
            enabled: false
        },
        markers: {
            colors:['#FF4560'],
            size: 0,
        },
        title: {
            text: 'Last Run Date',
            align: 'left',
        },
        fill: {
            type: 'gradient',
            colors: ['#FF4560'],
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100]
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return val;
                },
            },
            title: {
                text: 'Total Models'
            },
        },

        xaxis: {
            type: 'datetime',
            categories: {!! json_encode(array_column($LastRunDate, 'x'))!!}
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return val;
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#lastrun"), options);
    chart.render();
</script>
{{-- grafik 2 end --}}

{{-- grafik 4 start --}}
<script>
           var options = {
    series: [{{ $totalTeam50k }},{{ $totalTeam100k }},{{ $totalTeam1000k }},{{ $totalTeamKnowledge }},{{ $totalTeamSwag }},],
    chart: {
      height: 450,
      type: 'pie',
    },
              labels: ['$50,000','$100,000','$1,048,576','Knowledge','Swag',],
              plotOptions: {
                pie: {
                  donut: {
                    size: '70%',
                    background: 'transparent',
                    labels: {
                      show: true,
                      name: {
                        show: true,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                        color: undefined,
                        offsetY: -10,

                      },
                      value: {
                        show: true,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                        color: undefined,
                        offsetY: 16,
                        formatter: function(val) {
                          return val;
                        }
                      },
                      total: {
                        show: true,
                        label: 'Total',
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 'bold',
                        color: '#373d3f',
                        formatter: function(w) {
                          return w.globals.seriesTotals.reduce((a, b) => {
                            return a + b
                          }, 0);
                        }
                      }
                    }
                  }
                }
              },
              dataLabels: {
                enabled: true,
                formatter: function(val, opts) {
                  return opts.w.globals.labels[opts.seriesIndex];
                }
              },
              colors: ['#FA4443','#F9CE1D','#66DA26','#2983FF','#775DD0'],
              legend: {
                show: true,
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '12px',
                markers: {
                  width: 20,
                  height: 20
                }
              }
            };

            var chart = new ApexCharts(document.querySelector("#participants"), options);
            chart.render();
        </script>
    {{-- grafik 4 end --}}

{{-- grafik 3 start --}}
<script>
    var options = {
    series: [{
      data: [{{ $total50kData }},{{ $total100kData }},{{ $total1000kData }},{{ $totalKnowledgeData }},{{ $totalSwagData }}]
    }],
    chart: {
      type: 'bar',
      height: 350
    },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: false,
        }
      },
      grid:{
    row:{
        colors: ['#3F51B5', '#03A9F4']
    }
    },
    fill:{
        type:'solid',
        colors:['#1B998B'],
    },
      dataLabels: {
        enabled:false
      },
      xaxis: {
      categories: ['Total $50,000 Data','Total $100,000 Data','Total $ 1,048,576','Total Knowledge Data','Total Swag Data']
    }
  };

    var chart = new ApexCharts(document.querySelector("#totalDataCompetitions"), options);
    chart.render();
  </script>
  {{-- grafik 3 end --}}

{{-- grafik 5 start --}}

<script>
    var options = {
          series: [{
          data: [{{ $averagebusiness }},{{ $averagetabular }}]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            borderRadiusApplication: 'end',
            horizontal: true,
          }
        },

        title: {
            text: 'Average Downloads',
            align: 'center',
        },
        fill:{
            colors:['#A300D6','#00B1F2']
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['Business Tags', 'Tabular Tags',
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#averagedownloads"), options);
        chart.render();
</script>
{{-- grafik 5 end --}}

{{-- grafik 6 start --}}
<script>
    var options = {
          series: [{
          data: [{{ $averagebusinessviews }},{{ $averagetabularviews }}]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            borderRadiusApplication: 'end',
            horizontal: true,
          }
        },
        fill:{
            colors:['#DC962D']
        },
        title: {
            text: 'Average Views',
            align: 'center',
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['Business Tags', 'Tabular Tags',
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#averageviews"), options);
        chart.render();
</script>
{{-- grafik 6 end --}}
{{-- grafik 7 start --}}
<script>
    var options = {
      series: [{
        data: [{{ $averagebusinessusability }},{{ $averagetabularusability }}]
      }],
      chart: {
        type: 'bar',
        height: 350
      },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: false,
        }
      },
      grid:{
    row:{
        colors: ['#A0EC93']
    }
    },
    fill:{
        colors:['#24B50C'],
    },
      dataLabels: {
        enabled:false
      },
      xaxis: {
        categories: ['Business','Tabular']
      }
    };

    var chart = new ApexCharts(document.querySelector("#averageusability"), options);
    chart.render();
  </script>
{{-- grafik 7 end --}}
</body>
</html>
