@php($perm = new App\Policies\PagePolicy())
@php($perm->userCan( Route::currentRouteName()))
    <!DOCTYPE html>
<html lang="pt_BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ti team &amp; Low Cost contributors">
    <meta name="generator" content="Pedro Henrique & Washington">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portal LowCost</title>
    <!--  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('/css/list.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="wrapper">
    <!--sidebar-->
    @include('components.sidebar')

    <!--sidebar-->
    <!--navbar -->
    @include('components.navwrapper')
    <!--content-->
    <div class="container-xxl mt-4 mobile ">
        <h2 class="content-title pageName">Dashboard - Chamados</h2>
        <form method="POST" class="d-none">
            <div class="row gx-5 gy-3 mt-3 ">
                <div class="col-md-5">
                    <div class="mb-3">
                        <input type="hidden">
                        <label for="exampleInputEmail1" class="form-label">Buscar:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-search" aria-hidden="true"></i></label>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Data Inicial:</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                            <input type="text" id="inputGroupSelect01" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Data Final:</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect02"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                            <input type="text" id="inputGroupSelect02" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--table-->
    <!--end table-->
    <div class="container-xxl mt-4 mobile ">
        <div class="row">
            <div class="col-12">
                <iframe title="Dash GERDAU LowCost.v2" id="embedContainer"
                        style="width: 100%; height: 82vh; clip-path: polygon(0% 0%, 100% 0%, 100% calc(100% - 36px), 0% calc(100% - 36px));" src="https://app.powerbi.com/view?r=eyJrIjoiNzI3NTY2YTMtNTNlNy00OGJmLWFhZmQtNWE3MGJhNGNlM2U1IiwidCI6ImUwMjVlMGQ5LTE3ZjMtNDY0Mi05YzkxLTVmNmE4OTcyZTM2ZSJ9&pageName=ReportSectiona4b6d1d3587b678040b4" frameborder="0" allowFullScreen="true"></iframe>

            </div>
        </div>
    </div>

    <div class="container-xxl mt-4 mobile py-4 d-none ">
        <div class="row">
            <div class="col-12">
                <iframe title="Dash GERDAU LowCost.v2" id="embedContainer"
                        style="width: 100%; height: 82vh; clip-path: polygon(0% 0%, 100% 0%, 100% calc(100% - 36px), 0% calc(100% - 36px));" src="https://app.powerbi.com/view?r=eyJrIjoiNzI3NTY2YTMtNTNlNy00OGJmLWFhZmQtNWE3MGJhNGNlM2U1IiwidCI6ImUwMjVlMGQ5LTE3ZjMtNDY0Mi05YzkxLTVmNmE4OTcyZTM2ZSJ9&pageName=ReportSectiona4b6d1d3587b678040b4" frameborder="0" allowFullScreen="true"></iframe>

            </div>
        </div>
    </div>

    <div class="footer"></div>
    <!--wrapper-->
</div>
</body>
<script  src="{{asset('/js/script.js')}}"></script>
<script  src="{{asset('/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

    const chart_1 = document.getElementById('chart_1');
    const chart_2 = document.getElementById('chart_2');



    const labels1 = {!!  @json_encode($datasets,true)!!};
    const data1 = {
        labels: labels1,
        datasets: [
            {
                label: 'Dentro',
                data: {!! json_encode($dentro, true) !!},
                borderColor: "red",
            },
            {
                label: 'Fora',
                data: {!! json_encode($fora, true) !!},
                borderColor: "blue",
            }
        ]
    };
    const config1 = {
        type: 'bar',
        data: data1,
        options: {
            indexAxis: 'y',
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
                bar: {
                    borderWidth: 2,
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Sla Chamados'
                }
            }
        },
    };

    new Chart('chart_1', config1);

    const labels2 = {!!  @json_encode($datasets2,true)!!};
    const data2 = {
        labels: labels2,
        datasets: [
            {
                label: 'Target SLA %',
                data: {!! json_encode($target, true) !!},
                borderColor: "#189ab4",
            },
            {
                label: 'Chamados Dentro %',
                data: {!! json_encode($percent, true) !!},
                borderColor: "#4a7212",
            }
        ]
    };
    const config2 = {
        type: 'line',
        data: data2,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Atendimento SLA'
                }
            },
            scales: {
                xAxes: [{
                    ticks: {
                        display: false,
                    }
                },
                    {
                        position: "top",
                        ticks: {
                            maxRotation: 90,
                            minRotation: 80
                        }
                    }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
    };
    new Chart('chart_2', config2);

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.i18n/1.0.9/jquery.i18n.js" integrity="sha512-OU7TUd3qODSbwnF5mHouW66/Yt54mzh58k+rxfJili7AunMl5wbF2D8kLGTGuUv5xM2MfylWZOPZaqOKpf7dZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $.datepicker.setDefaults( $.datepicker.regional[ "pt-BR" ] );
    $( "#inputGroupSelect01" ).datepicker();
    $( "#inputGroupSelect02" ).datepicker();
</script>
</html>
