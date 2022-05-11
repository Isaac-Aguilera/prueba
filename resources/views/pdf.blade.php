<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script  src="{{ asset('js/app.js') }}" defer></script>
        <script  src="{{ asset('js/datos.js') }}" defer></script>
        <script  src="{{ asset('chart.js/chart.js') }}" ></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
              <a class="navbar-brand border border-secondary p-2 rounded-pill" href="/">
                EFA
              </a>
              <button id="toggle" onclick="toggle()" class="button navbar-brand border border-secondary p-2 rounded-pill">
                Graficas
              </button>
            </div>
          </nav>
    </header>
    <body >
        <div id="tabla">
            <div class="container-fluid w-75">
                <div class="row justify-content-between">
                    <p class="col-4 mt-2 fs-1 text-left align-self-center">Clientes fraudulentos</p>
                    <div class="col-6 align-self-center d-flex">
                        <label for="search" class="me-2 fs-4">Search:</label>
                        <input id='search' class="form-control" onkeyup='searchTable()' type='text'>
                    </div>
                </div>
            </div>
            <div style="height:70vh;" class=" w-75 table-responsive m-auto mb-0">
               
                <p>{{var_dump($clients);}}</p>
            </div>
        </div>
        <div id="graficas" hidden="true"> 
            <canvas id="myChart" style="width:100%;max-height:70vh"></canvas>
        </div>
    </body>
    <footer class="position-fixed bottom-0 start-50 translate-middle text-nowrap">
        <p class="row justify-content-center text-nowrap">Website provided by Isaac Aguilera Cano for VOLTDYNAMICS Inc || Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) </p>
    </footer>
</html>

<script>
    var xyValues = [
    {x:50, y:7},
    {x:60, y:8},
    {x:70, y:8},
    {x:80, y:9},
    {x:90, y:9},
    {x:100, y:9},
    {x:110, y:10},
    {x:120, y:11},
    {x:130, y:14},
    {x:140, y:14},
    {x:150, y:15}
    ];

    new Chart("myChart", {
    type: "scatter",
    data: {
        datasets: [{
        pointRadius: 4,
        pointBackgroundColor: "rgba(0,0,255,1)",
        data: xyValues
        }]
    },
    });

</script>