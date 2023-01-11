<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
    <link rel="stylesheet" href="{{ public_path('css\print.css') }}" media="all" />
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
                                <img src="{{ $imgSystem }}">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-top: 7pt">
                            Sistema
                        </div>
                        <div class="col-sm-6">{{ $system->nameSystem }}</div>
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
        @foreach ($system->subsystems as $subsystem)
            <div class="row">
                <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height">
                    <div class="col-sm-12 nv-box-container text-bold" style="text-align: center">
                        {{ strtoupper($subsystem->nameSubsystem) }}
                    </div>
                </div>
            </div>
            @if (!empty($subsystem->parameters))
                <div class="col-sm-12 text-bold">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach ($subsystem->parameters[0]->samplingpoints as $key => $sp)
                                    <th class="text-14pt">
                                        <div>
                                            <img src="{{ $badges[$key] }}" class="box-pm">
                                            <br>
                                            {{ $sp->nameSamplingpoint }}
                                        </div>
                                    </th>
                                @endforeach
                                <th class="text-14pt">
                                    <img src="{{ $rangepm }}" class="box-pm">
                                    <br>
                                    Rango de control
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsystem->parameters as $key => $p)
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
                                                <div class="col-sm-9" style="margin-top:15px">{{ $p->nameParameter }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @if ($key % 2 == 0)
                                        @foreach ($p->samplingpoints as $key => $sp)
                                            <td class="nv-bg-color-gray">
                                                {{ $sp->finalResult }}
                                            </td>
                                        @endforeach
                                        <td class="nv-bg-color-gray">
                                            @foreach ($p->samplingpoints as $key => $sp)
                                                <div class="col-sm-12">
                                                    {{ $sp->nameSamplingpoint }}: {{ $sp->codeValue }} -
                                                    {{ $sp->value }}
                                                </div>
                                            @endforeach
                                        </td>
                                    @else
                                        @foreach ($p->samplingpoints as $key => $sp)
                                            <td class="nv-bg-color-lightgray">
                                                {{ $sp->finalResult }}
                                            </td>
                                        @endforeach
                                        <td class="nv-bg-color-lightgray">
                                            @foreach ($p->samplingpoints as $key => $sp)
                                                <div class="col-sm-12">
                                                    {{ $sp->nameSamplingpoint }}: {{ $sp->codeValue }} -
                                                    {{ $sp->value }}
                                                </div>
                                            @endforeach
                                        </td>
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
            @endif
            <br>
            <br>
            <div class="nv-box-container2 text-bold">
                @foreach ($subsystem->graphs as $g)
                    <div class="col-sm-4 text-center">
                        <div class="col-sm-12 text-11pt">
                            {{ $g->nameSamplingpoint }}
                        </div>
                        <div class="col-sm-12">
                            <img src="{{ public_path('\\storage\\' . $g->graph) }}" style="width: 100%">
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="display:block; clear:both; page-break-after:always;"></div>
        @endforeach
        <div class="nv-box-container2 text-bold"
            style="border: 1px solid blue; height: 280px; padding-top: 20px; padding-bottom: 20px">
            <div class="col-sm-1" style="text-align: right">
                <img src="{{ $imgConclusion }}" width="35">
            </div>
            <div class="col-sm-10" style="margin-top: 7px; margin-left: 20px">
                Conclusiones
            </div>
            <div class="col-sm-12" style="text-align: justify">
                {{ $system->conclusions }}
            </div>
        </div>
        <br>
        <div class="nv-box-container2 text-bold"
            style="border: 1px solid blue; height: 280px; padding-top: 20px; padding-bottom: 20px">
            <div class="col-sm-1" style="text-align: right">
                <img src="{{ $imgRecomendacion }}" width="35">
            </div>
            <div class="col-sm-10" style="margin-top: 7px; margin-left: 20px">
                Recomendaciones
            </div>
            <div class="col-sm-12" style="text-align: justify">
                {{ $system->descriptionsAndRecomendations }}
            </div>
        </div>
        <div style="display:block; clear:both; page-break-after:always;"></div>
        <div class="nv-box-container text-bold">
            <div class="col-sm-5">
                <div class="col-sm-3"
                    style="height: 80px; background: blue;border-top-left-radius: 40px;border-bottom-left-radius: 40px; text-align: center">
                    <img src="{{ $imgProducto }}" width="50" style="margin-top: 15px">
                </div>
                <div class="col-sm-9 nv-bg-color-lightgray" style="height: 80px;">
                    <div class="col-sm-5" style="height: 10px;"></div>
                    <div class="col-sm-7" style="background: rgba(0,0,255,0.7);height: 10px"></div>
                    <div class="col-sm-8" style="color:blue;font-size: 26px; margin-left: 15px">
                        STOCK DE
                        PRODUCTOS
                    </div>
                </div>
            </div>
        </div>
        <div class="nv-box-container text-bold">
            @foreach ($system->meditionsStock as $stock)
                <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height" style="margin-top: 50px">
                    <div class="col-sm-12 nv-box-container text-bold" style="text-align: center">
                        {{ strtoupper($stock->nameSubsystem) }}
                    </div>
                </div>
                <div class="col-sm-12 text-bold" style="margin-top: 50px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach ($stock->products as $key => $proH)
                                    <th class="text-14pt">
                                        <div>
                                            <img src="{{ $badges[1] }}" class="box-pm">
                                            <br>
                                            {{ $proH->name }}
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
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
                                            <div class="col-sm-9" style="margin-top:15px">Stock de p roducto (Kg)
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @foreach ($stock->products as $key => $proR)
                                    @if ($key % 2 == 0)
                                        <td class="nv-bg-color-gray">{{ $proR->valueStock }}</td>
                                    @else
                                        <td class="nv-bg-color-lightgray">{{ $proR->valueStock }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

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
                                            <div class="col-sm-9" style="margin-top:15px">Dosis químico (kg/día)
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @foreach ($stock->products as $key => $proR)
                                    @if ($key % 2 == 0)
                                        <td class="nv-bg-color-gray">{{ $proR->agreedDose }}</td>
                                    @else
                                        <td class="nv-bg-color-lightgray">{{ $proR->agreedDose }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

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
                                            <div class="col-sm-9" style="margin-top:15px">Próximo despacho
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @foreach ($stock->products as $key => $proR)
                                    @if ($key % 2 == 0)
                                        <td class="nv-bg-color-gray"></td>
                                    @else
                                        <td class="nv-bg-color-lightgray"></td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>

    </div>
</body>

</html>
