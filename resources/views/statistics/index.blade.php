@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Estadísticas</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div id="categoryContainer" class="mt-4 mb-4"></div>
                        <div id="subcategoryContainer" class="mb-4"></div>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">
    let categoryNames = JSON.parse('{{$categoryData['names']}}'.replaceAll('&quot;', '"'));
    let subcategoryNames = JSON.parse('{{$subcategoryData['names']}}'.replaceAll('&quot;', '"'));
    let subcategoryCounts = JSON.parse('{{$subcategoryData['counts']}}');
    let categoryCounts = JSON.parse('{{$categoryData['counts']}}');
    let categoryData = [];
    let subcategoryData = [];

    console.log(categoryCounts);

    for (let i = 0; i < categoryCounts.length; i++) {
        let categoryDataObject = {
            name: categoryNames[i],
            y: categoryCounts[i]
        }

        categoryData.push(categoryDataObject);

    }

    for (let i = 0; i < subcategoryCounts.length; i++) {
        let subcategoryDataObject = {
            name: subcategoryNames[i],
            y: subcategoryCounts[i]
        }

        subcategoryData.push(subcategoryDataObject);
    }

    Highcharts.chart('categoryContainer', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Categorías',
            align: 'left'
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
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Categorías',
            colorByPoint: true,
            data: categoryData
        }]
    });

    Highcharts.chart('subcategoryContainer', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Subcategorías',
            align: 'left'
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
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Subcategorías',
            colorByPoint: true,
            data: subcategoryData
        }]
    });



</script>


@endsection

