<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script  src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://www.google.com/jsapi"></script>

    <style>

        .pie-chart {

            width: 600px;

            height: 400px;

            margin: 0 auto;

        }

        .text-center{

            text-align: center;

        }

    </style>

</head>

<body>

  

<h2 class="text-center">Generate PDF with Chart in Laravel</h2>

  

<div id="chartDiv" class="pie-chart"></div>

  

<div class="text-center">

    <a href="{{ route('download') }}">Download PDF File</a>

    <h2>ItSolutionStuff.com.com</h2>

</div>

  

<script type="text/javascript">

    window.onload = function() {

        google.load("visualization", "1.1", {

            packages: ["corechart"],

            callback: 'drawChart'

        });

    };

  

    function drawChart() {

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Pizza');

        data.addColumn('number', 'Populartiy');

        data.addRows([

            ['Laravel', 33],

            ['Codeigniter', 26],

            ['Symfony', 22],

            ['CakePHP', 10],

            ['Slim', 9]

        ]);

  

        var options = {

            title: 'Popularity of Types of Framework',

            sliceVisibilityThreshold: .2

        };

  

        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));

        chart.draw(data, options);

    }

</script>

  

</body>

</html>