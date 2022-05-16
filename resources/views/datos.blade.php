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
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
              <a class="navbar-brand border border-secondary p-2 rounded-pill" href="/">
                EFA
              </a>
                <form id="make_pdf" action="{{route('generatePDF')}}" method="post">
                    @csrf
                    <input type="hidden" name="hidden_html" id="hidden_html" />

                    <input class="btn btn-success" name="create_pdf" id="create_pdf" type="submit" value="Generar PDF" >
                </form>
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
            <div id="table" style="height:70vh;" class=" w-75 table-responsive m-auto mb-0">
                <table class="table table-hover align-top">
                    <thead style="position: sticky;top: 0;background-color: #e3f2fd;">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Ip</th>
                            <th scope="col">Consumption</th>
                            <th scope="col">Energy cost</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($clients as $client)
                            <tr>
                                <th scope="row">{{$client->id}}</th>
                                <td>{{$client->first_name}}</td>
                                <td>{{$client->last_name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->gender}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->ip_address}}</td>
                                <td>{{$client->consumption}}</td>
                                <td>{{$client->energy_cost}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="graficas" style="height:70vh;" class="row justify-content-around" hidden="true">
            <h1 class="row justify-content-center fs-1 m-3">Graficas</h1>
            <img style="width: 700px; margin-bottom: 50px;" class="col-4 align-self-center" src="https://quickchart.io/chart?c={type:'bar',data:{labels:['300-325','325-350','350-375','375-400','400-425','425-450','450-475','475-∞'],datasets:[{label:'Numero de clientes fraudulentos en rangos de consumo',data:[
                <?php
                    $data = [0,0,0,0,0,0,0,0];
                    foreach ($clients as $client) {
                            if ($client->consumption >= 300 && $client->consumption < 325) {
                                $data[0]++;
                            } elseif ($client->consumption >= 325 && $client->consumption < 350) {
                                $data[1]++;
                            } elseif ($client->consumption >= 350 && $client->consumption < 375) {
                                $data[2]++;
                            } elseif ($client->consumption >= 375 && $client->consumption < 400) {
                                $data[3]++;
                            } elseif ($client->consumption >= 400 && $client->consumption < 425) {
                                $data[4]++;
                            } elseif ($client->consumption >= 425 && $client->consumption < 450) {
                                $data[5]++;
                            } elseif ($client->consumption >= 450 && $client->consumption < 475) {
                                $data[6]++;
                            } elseif ($client->consumption >= 475) {
                                $data[7]++;
                            }
                    }
                    echo("$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7]");
                ?>
            ]}]}}">
            <img style="width: 700px;" class="col-4 align-self-center" src="https://quickchart.io/chart?c={ type: 'pie', data: { datasets: [ { data: [ 
                <?php
                    echo(count($clients));echo(",");echo($total-count($clients));
                ?>
            ], backgroundColor: [ 'rgb( 231, 76, 60 )', 'rgb( 39, 174, 96 )' ], label: 'Dataset 1', }, ], labels: ['Clientes fraudulentos', 'Clientes legales'], }, } ">
        </div>
    </body>
    <footer class="position-fixed bottom-0 start-50 translate-middle text-nowrap">
        <p class="row justify-content-center text-nowrap">Website provided by Isaac Aguilera Cano for VOLTDYNAMICS Inc || Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) </p>
    </footer>
</html>
