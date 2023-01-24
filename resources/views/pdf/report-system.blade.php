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
                    <p>CONSECUTIVO {{ $system->idVisit }}</p>
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
        <div class="nv-box-container2" style="margin-top: 15px">
            <div class="mx-auto">
                <div class="col-sm-12 nv-bg-color-gray nv-text-color-purple box-height">
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5">
                                <img src="{{ $calendar }}">
                            </div>
                        </div>
                        <div class="col-sm-3 text-bold" style="margin-top: 7pt">
                            Fecha
                        </div>
                        <div class="col-sm-6 no-bold" style="margin-top: 7pt">{{ $system->dateVisit }}</div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 7pt">
                                <img src="{{ $send }}">
                            </div>
                        </div>
                        <div class="col-sm-3 text-bold" style="margin-top: 7pt">
                            Dirigido a
                        </div>
                        <div class="col-sm-6 no-bold" style="margin-top: 7pt">{{ '2022-12-29 13:08' }}</div>
                    </div> --}}
                </div>
                <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height">
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 3pt">
                                <img src="{{ $building }}">
                            </div>
                        </div>
                        <div class="col-sm-3 text-bold" style="margin-top: 7pt">
                            Empresa
                        </div>
                        <div class="col-sm-6 no-bold" style="margin-top: 7pt">{{ $system->client }}</div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 7pt">
                                <img src="{{ $email }}">
                            </div>
                        </div>
                        <div class="col-sm-3 text-bold" style="margin-top: 7pt">
                            Copia a
                        </div>
                        <div class="col-sm-6 no-bold" style="margin-top: 7pt">{{ '2022-12-29 13:08' }}</div>
                    </div> --}}
                </div>
                <div class="col-sm-12 nv-bg-color-gray nv-text-color-purple box-height">
                    <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 3pt">
                                <img src="{{ $imgSystem }}">
                            </div>
                        </div>
                        <div class="col-sm-3 text-bold" style="margin-top: 7pt">
                            Sistema
                        </div>
                        <div class="col-sm-6 no-bold" style="margin-top: 7pt">{{ $system->nameSystem }}</div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="col-sm-3 nv-icon-box">
                            <div class="col-sm-offset-5" style="margin-top: 7pt">
                                <img src="{{ $email }}">
                            </div>
                        </div>
                        <div class="col-sm-3 text-bold" style="margin-top: 7pt">
                            Copia a
                        </div>
                        <div class="col-sm-6 no-bold" style="margin-top: 7pt">{{ '2022-12-29 13:08' }}</div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 15px">
            <div class="nv-bg-color-purple nv-box-container-full" style="height: 5px;">
            </div>
        </div>
        @foreach ($system->subsystems as $subsystem)
            <div class="row" style="margin-top: 20px">
                <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height">
                    <div class="col-sm-12 nv-box-container text-bold" style="text-align: center">
                        {{ strtoupper($subsystem->nameSubsystem) }}
                    </div>
                </div>
            </div>
            @if (!empty($subsystem->parameters))
                <div class="col-sm-12" style="margin-top: 15px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach ($subsystem->headers as $key => $sp)
                                    <th class="text-14pt text-bold text-azul">
                                        <div>
                                            <img src="{{ $badges[$key] }}" class="box-pm">
                                            <br>
                                            {{ $sp }}
                                        </div>
                                    </th>
                                @endforeach
                                @foreach ($subsystem->headers as $key => $sp)
                                    <th class="text-14pt text-bold text-azul">
                                        <div>
                                            <img src="{{ $rangepm }}" class="box-pm">
                                            <br>
                                            Rango de control <br>
                                            {{ $sp }}
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsystem->parameters as $key => $p)
                                <tr>
                                    <td class="nv-parameters text-bold">
                                        <div
                                            style="background: rgb(0, 102, 179); border-top-left-radius: 50px; border-bottom-left-radius: 50px; height: 50px;">
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
                                            <td class="nv-bg-color-gray text-center no-bold text-azul">
                                                <div @class(['text-red' => !$sp->validRange, 'text-azul' => $sp->validRange])>
                                                    {{ $sp->finalResult }}
                                                </div>
                                            </td>
                                        @endforeach
                                        @foreach ($p->samplingpoints as $key => $sp)
                                            <td class="nv-bg-color-lightgray text-center no-bold">
                                                <div class="text-azul">
                                                    {{ strtolower($sp->codeValue) }} {{ $sp->value }}
                                                </div>
                                            </td>
                                        @endforeach
                                    @else
                                        @foreach ($p->samplingpoints as $key => $sp)
                                            <td class="nv-bg-color-lightgray text-center no-bold">
                                                <div @class(['text-red' => !$sp->validRange, 'text-azul' => $sp->validRange])>
                                                    {{ $sp->finalResult }}
                                                </div>
                                            </td>
                                        @endforeach
                                        @foreach ($p->samplingpoints as $key => $sp)
                                            <td class="nv-bg-color-lightgray text-center no-bold">
                                                <div class="text-azul">
                                                    {{ strtolower($sp->codeValue) }} {{ $sp->value }}
                                                </div>
                                            </td>
                                        @endforeach
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
        <div class="nv-box-container2"
            style="border: 1px solid rgb(0, 102, 179); height: 280px; padding-top: 20px; padding-bottom: 20px">
            <div class="col-sm-1" style="text-align: right">
                <img src="{{ $imgConclusion }}" width="35">
            </div>
            <div class="col-sm-10 text-bold" style="margin-top: 7px; margin-left: 20px; color: rgb(0, 102, 179)">
                Conclusiones
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-10 text-azul" style="text-align: justify; margin-top: 25px">
                {{ $system->conclusions }}
            </div>
            <div class="col-sm-1"></div>
        </div>
        <br>
        <div class="nv-box-container2"
            style="border: 1px solid rgb(0, 102, 179); height: 280px; padding-top: 20px; padding-bottom: 20px">
            <div class="col-sm-1" style="text-align: right">
                <img src="{{ $imgRecomendacion }}" width="35">
            </div>
            <div class="col-sm-10 text-bold" style="margin-top: 7px; margin-left: 20px; color: rgb(0, 102, 179)">
                Recomendaciones
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-10 text-azul" style="text-align: justify; margin-top: 25px">
                {{ $system->descriptionsAndRecomendations }}
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div style="display:block; clear:both; page-break-after:always;"></div>
        <div class="nv-box-container text-bold">
            <div class="col-sm-5">
                <div class="col-sm-3"
                    style="height: 80px; background: rgb(0, 102, 179);border-top-left-radius: 40px;border-bottom-left-radius: 40px; text-align: center">
                    <img src="{{ $imgProducto }}" width="50" style="margin-top: 15px">
                </div>
                <div class="col-sm-9 nv-bg-color-lightgray" style="height: 80px;">
                    <div class="col-sm-5" style="height: 10px;"></div>
                    <div class="col-sm-7" style="background: rgba(0, 102, 179,0.7);height: 10px"></div>
                    <div class="col-sm-8" style="color:rgb(0, 102, 179);font-size: 26px; margin-left: 15px">
                        STOCK DE
                        PRODUCTOS
                    </div>
                </div>
            </div>
        </div>
        <div class="nv-box-container">
            @foreach ($system->meditionsStock as $stock)
                <div class="col-sm-12 nv-bg-color-lightgray nv-text-color-purple box-height" style="margin-top: 50px">
                    <div class="col-sm-12 nv-box-container text-bold" style="text-align: center">
                        {{ strtoupper($stock->nameSubsystem) }}
                    </div>
                </div>
                <div class="col-sm-12" style="margin-top: 50px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach ($stock->products as $key => $proH)
                                    <th class="text-14pt text-bold text-azul">
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
                                        style="background: rgb(0, 102, 179); border-top-left-radius: 50px; border-bottom-left-radius: 50px; height: 50px;">
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
                                        <td class="nv-bg-color-gray text-center no-bold text-azul">{{ $proR->valueStock }}</td>
                                    @else
                                        <td class="nv-bg-color-lightgray text-center no-bold text-azul">{{ $proR->valueStock }}
                                        </td>
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
                                        style="background: rgb(0, 102, 179); border-top-left-radius: 50px; border-bottom-left-radius: 50px; height: 50px;">
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
                                        <td class="nv-bg-color-gray text-center no-bold text-azul">{{ $proR->agreedDose }}</td>
                                    @else
                                        <td class="nv-bg-color-lightgray text-center no-bold text-azul">{{ $proR->agreedDose }}
                                        </td>
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
                                        style="background: rgb(0, 102, 179); border-top-left-radius: 50px; border-bottom-left-radius: 50px; height: 50px;">
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
                                        <td class="nv-bg-color-gray text-center no-bold text-azul"></td>
                                    @else
                                        <td class="nv-bg-color-lightgray text-center no-bold text-azul"></td>
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
        <div class="col-sm-12" style="height: 80px;">
        </div>
        <div class="nv-box-container">
            <div class="col-sm-5 text-bold text-azul">
                Firma del técnico
            </div>
            <div class="col-sm-5 text-bold text-azul" style="margin-left: 50px">
                Firma quien recibe
            </div>
            <div class="col-sm-5" style="height: 120px; border-bottom: 1px solid black"></div>
            <div class="col-sm-5" style="height: 120px; border-bottom: 1px solid black; margin-left: 50px"></div>
        </div>
    </div>
</body>

</html>
