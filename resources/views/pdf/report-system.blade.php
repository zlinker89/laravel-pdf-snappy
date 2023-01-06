<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
    <link rel="stylesheet" href="{{ public_path('css\print.css') }}" media="all" />
    <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            init()
        };
        function init() {
            google.load("visualization", "1.1", {
                packages: ["corechart"],
                callback: 'drawChart'
            });
        }

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tea');
            data.addColumn('number', 'Populartiy');
            data.addRows([
                ['Bourn Tea', 40],
                ['Lemon Tea', 22],
                ['Green Tea', 26],
                ['Black Tea', 35], // Below limit.
                ['Special Tea', 35] // Below limit.
            ]);

            var options = {
                title: 'Popularity of Types of Tea',
                sliceVisibilityThreshold: .2
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="nv-box-container">
            <div class="col-sm-3">
                <img class="mx-auto img-fluid" src="{{ $logo }}" style="width: 200px" alt="novaquimica-logo">
            </div>
            <div class="col-sm-6 text-center text-bold">
                <div class="col-sm-12 text-12pt" style="height: 40pt">
                    <p>CONSECUTIVO 481345</p>
                </div>
                <div class="col-sm-12 nv-text-color-purple" id="title-pdf">
                    <p>ANÁLISIS FISICOQUÍMICO DE AGUA</p>
                </div>
            </div>
            <div class="col-sm-3 text-center text-12pt">
                <p>
                    Código: GV-F01 <br>
                    Versión: 2
                </p>
            </div>
        </div>
        <div class="nv-box-container2 text-bold">
            <div class="mx-auto">
                <div class="col-sm-12 nv-bg-color-gray nv-text-color-purple box-height">
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5">
                                <img src="{{ $calendar }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Fecha
                        </div>
                        <div class="col-sm-6">{{ '2022-12-29 13:08' }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 7pt">
                                <img src="{{ $send }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Dirigido a
                        </div>
                        <div class="col-sm-6">{{ '2022-12-29 13:08' }}</div>
                    </div>
                </div>
                <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height">
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 3pt">
                                <img src="{{ $building }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Empresa
                        </div>
                        <div class="col-sm-6">{{ '2022-12-29 13:08' }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 7pt">
                                <img src="{{ $email }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Copia a
                        </div>
                        <div class="col-sm-6">{{ '2022-12-29 13:08' }}</div>
                    </div>
                </div>
                <div class="col-sm-12 nv-bg-color-gray nv-text-color-purple box-height">
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 3pt">
                                <img src="{{ $system }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Sistema
                        </div>
                        <div class="col-sm-6">{{ '2022-12-29 13:08' }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 7pt">
                                <img src="{{ $email }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Copia a
                        </div>
                        <div class="col-sm-6">{{ '2022-12-29 13:08' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="nv-bg-color-purple nv-box-container-full" style="height: 5px;">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height">
                <div class="col-sm-12 nv-box-container text-bold" style="text-align: center">
                    TORRE DE ENFRIAMIENTO I
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-bold">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-14pt">
                            <div>
                                <img src="{{ $bagdepm1 }}" class="box-pm">
                                <br>
                                Punto de muestreo I
                            </div>
                        </th>
                        <th class="text-14pt">
                            <img src="{{ $bagdepm2 }}" class="box-pm">
                            <br>
                            Punto de muestreo II
                        </th>
                        <th class="text-14pt">
                            <img src="{{ $bagdepm3 }}" class="box-pm">
                            <br>
                            Punto de muestreo III
                        </th>
                        <th class="text-14pt">
                            <img src="{{ $rangepm }}" class="box-pm">
                            <br>
                            Rango de control
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parameters as $key => $p)
                        <tr>
                            <td class="nv-parameters text-bold">
                                <div
                                    style="background: rgb(31, 78, 121); border-top-left-radius: 50px; border-bottom-left-radius: 50px; height: 50px;">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div
                                                style="height: 40px; width: 40px; border-radius: 50px; background: white; margin-left: 5px; margin-top:5px">
                                            </div>
                                        </div>
                                        <div class="col-sm-9" style="margin-top:15px">{{ $p }}</div>
                                    </div>
                                </div>
                            </td>
                            @if ($key % 2 == 0)
                                <td class="nv-bg-color-gray"></td>
                                <td class="nv-bg-color-gray"></td>
                                <td class="nv-bg-color-gray"></td>
                                <td class="nv-bg-color-gray"></td>
                            @else
                                <td class="nv-bg-color-lightgray"></td>
                                <td class="nv-bg-color-lightgray"></td>
                                <td class="nv-bg-color-lightgray"></td>
                                <td class="nv-bg-color-lightgray"></td>
                            @endif
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style = "display:block; clear:both; page-break-after:always;"></div>
        <div class="nv-box-container2 text-bold">
            <div id="chart_div" style="width: 800px; height: 800px;"></div>
        </div>
    </div>
</body>

</html>

