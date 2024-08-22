@extends('admin.layout')

@section('styles')
<script src="{{asset('assets/layout/js/highcharts.js')}}"></script>
<script src="{{asset('assets/layout/js/exporting.js')}}"></script>
<script src="{{asset('assets/layout/js/export-data.js')}}"></script>
<script src="{{asset('assets/layout/js/accessibility.js')}}"></script>
<script src="{{asset('assets/layout/js/highcharts-more.js')}}"></script>
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 660px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff
    }
    /* {{-- ---------------------------------BAR CHART-----------------------------------------------------------}} */
    #container {
    height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
    min-width: 320px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>

@endsection

@section('content')
<x-flash-message/>

<div class="main-content container-fluid">
    <section class="section">
        <div class="row mb-2">

            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                        <h5 class= 'card-title px-3  d-flex justify-content-between'>Total Teacher <i class='fas fa-user-secret fa-fw' style='font-size:30px;color:rgb(7, 7, 7)'
                                width="20"></i></h5>

                        <p class=' card-title px-3 py-4 d-flex justify-content-between'>{{$teacher}}</p>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    
    
                            <h5 class= 'card-title px-3  d-flex justify-content-between'>Total Users<i class='fas fa-users fa-fw' style='font-size:30px;color:rgb(7, 7, 7)'
                        width="20"></i></h5>

                            <p class=' card-title px-3 py-4 d-flex justify-content-between'>{{$user}}</p>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <h5 class= 'card-title px-3  d-flex justify-content-between'>Pre-Enrollment<i class='fas fa-user-check' style='font-size:30px;color:rgb(7, 7, 7)'
                        width="20"></i></h5><p class=' card-title px-3 py-4 d-flex justify-content-between'>{{$pre}}</p>
                </div>
            </div>
            

             <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    
    
                            <h5 class= 'card-title px-3  d-flex justify-content-between'>Total Request <i class='fas fa-id-card fa-fw' style='font-size:30px;color:rgb(7, 7, 7)'
                        width="20"></i></h5>

                            <p class=' card-title px-3 py-4 d-flex justify-content-between'>{{$transcript}}</p>
       
                 </div>
                 
            </div>
            
               
{{-- ---------------------------------BAR CHART-----------------------------------------------------------}}
                <div class="row">
                    <div class=" col-lg-6">
                        <figure class="highcharts-figure">
                        <div id="containerr"></div>
                        
                        </figure>
                    </div>
                <div class=" col-lg-6">
                   
                        <figure class="highcharts-figure">
                        <div id="container"></div>
                        </figure>
                </div>
             </div>
                
            </div>

        </div>

            
        </div>
        </section>
</div>

    
@endsection
@section('script')

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>

<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Percentage of Total Enrolled by Strand'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Students',
        colorByPoint: true,
        data: [{
            name: 'STEM',
            y: {{$stem}},
            sliced: true,
            selected: true
        },  {
            name: 'ABM',
            y: {{$abm}},
        },  {
            name: 'GAS',
            y: {{$gas}},
        }, {
            name: 'HUMMS',
            y: {{$humms}},
        }, {
            name: 'TVL',
            y:{{$tvl}},
        }]
    }]
});

// {{-- ---------------------------------BAR CHART-----------------------------------------------------------}}
const chart = Highcharts.chart('containerr', {
    title: {
        text: 'Total Students Enrolled Yearly'
    },
    
    xAxis: {
        categories: ['2021-2022','2022-2023','2020-2021', '2023-2024','2024-2025',]
    },
    series: [{
        type: 'column',
        name: 'Students',
        colorByPoint: true,
        data: [{{$two_one}}, {{$two_two}}, {{$zero_zero}}, {{$two_three}}, {{$two_four}}],
        showInLegend: false
    }]
});

document.getElementById('plain').addEventListener('click', () => {
    chart.update({
        chart: {
            inverted: false,
            polar: false
        },
        subtitle: {
            text: 'Chart option: Plain | Source: ' +
                '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                'target="_blank">NAV</a>'
        }
    });
});

document.getElementById('inverted').addEventListener('click', () => {
    chart.update({
        chart: {
            inverted: true,
            polar: false
        },
        subtitle: {
            text: 'Chart option: Inverted | Source: ' +
                '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                'target="_blank">NAV</a>'
        }
    });
});

document.getElementById('polar').addEventListener('click', () => {
    chart.update({
        chart: {
            inverted: false,
            polar: true
        },
        subtitle: {
            text: 'Chart option: Polar | Source: ' +
                '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                'target="_blank">NAV</a>'
        }
    });
});
</script>

@endsection


