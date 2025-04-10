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

    <title>Portal LowCost </title>
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
    <style>
        .logoBar
        {
            display: none !important;
            visibility: hidden;
            opacity: 0;
        }
    </style>
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
        <h2 class="content-title pageName">Dashboard - Faturamento</h2>
        <form method="POST" class="d-none">
            <div class="row gx-5 gy-3 mt-3 ">
                <div class="col-5">
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
            <div class="embed-responsive embed-responsive-16by9">

            <iframe  id="embedContainer"
                     style="width: 100%; height: 82vh; clip-path: polygon(0% 0%, 100% 0%, 100% calc(100% - 36px), 0% calc(100% - 36px));"
                     title="Dash GERDAU LowCost.v2" class="embed-responsive-item"
                     src="https://app.powerbi.com/view?r=eyJrIjoiNzI3NTY2YTMtNTNlNy00OGJmLWFhZmQtNWE3MGJhNGNlM2U1IiwidCI6ImUwMjVlMGQ5LTE3ZjMtNDY0Mi05YzkxLTVmNmE4OTcyZTM2ZSJ9&pageName=ReportSectioncf96a2b0315634000d02&navContentPaneEnabled=false&actionBarEnabled=false" frameborder="0" allowFullScreen="true"></iframe>

            </div>
        </div>
    </div>
    <div class="container-xxl mt-4 mobile d-none ">
        <form method="POST">
            <div class="row gx-5 gy-3 mt-3 ">
                <div class="col-5">
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
    <div class="container-xxl mt-4 mobile ">
        <h2 class="content-title pageName">Ocorrencia</h2>

        <div class="row mt-2 py-4">
            <div class="embed-responsive embed-responsive-16by9">

                <iframe  id="embedContainer"
                         style="width: 100%; height: 82vh; clip-path: polygon(0% 0%, 100% 0%, 100% calc(100% - 36px), 0% calc(100% - 36px));"
                         title="Dash GERDAU LowCost.v2" class="embed-responsive-item"
                         src="https://app.powerbi.com/view?r=eyJrIjoiNzI3NTY2YTMtNTNlNy00OGJmLWFhZmQtNWE3MGJhNGNlM2U1IiwidCI6ImUwMjVlMGQ5LTE3ZjMtNDY0Mi05YzkxLTVmNmE4OTcyZTM2ZSJ9&pageName=ReportSection411e0faa6ebfcaab8acf" frameborder="0" allowFullScreen="true"></iframe>

            </div>
        </div>
        </div>
    </div>
    <!--wrapper-->
</div>
</body>
<script  src="{{asset('/js/script.js')}}"></script>
<script  src="{{asset('/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    jQuery.fn.load = function (callback) {
        var el = $(this);

        el.on('load', callback);

        return el;
    };

</script>
</html>
