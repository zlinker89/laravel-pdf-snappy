<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use App\Http\Helpers\QuickChart;
use stdClass;

class PDFController extends Controller
{
    private $RANGEA;
    private $RANGEB;
    private $RANGEC;
    private $RANGED;
    public function __construct()
    {
        $this->RANGEA = [
            (object)[
                "min" => 50,
                "max" => 399,
                "value" => 0.1
            ],
            (object)[
                "min" => 400,
                "max" => 1000,
                "value" => 0.2
            ]
        ];
        $this->RANGEB = [
            (object)[
                "min" => 0,
                "max" => 1.9,
                "value" => 2.6
            ],
            (object)[
                "min" => 2,
                "max" => 6.9,
                "value" => 2.5
            ],
            (object)[
                "min" => 7,
                "max" => 8.9,
                "value" => 2.4
            ],
            (object)[
                "min" => 9,
                "max" => 13.9,
                "value" => 2.3
            ],
            (object)[
                "min" => 14,
                "max" => 17.9,
                "value" => 2.2
            ],
            (object)[
                "min" => 18,
                "max" => 21.9,
                "value" => 2.1
            ],
            (object)[
                "min" => 22,
                "max" => 27.9,
                "value" => 2.0
            ],
            (object)[
                "min" => 28,
                "max" => 31.9,
                "value" => 1.9
            ],
            (object)[
                "min" => 32,
                "max" => 37.9,
                "value" => 1.8
            ],
            (object)[
                "min" => 38,
                "max" => 43.9,
                "value" => 1.7
            ],
            (object)[
                "min" => 44,
                "max" => 50.9,
                "value" => 1.6
            ],
            (object)[
                "min" => 51,
                "max" => 55.9,
                "value" => 1.5
            ],
            (object)[
                "min" => 56,
                "max" => 63.9,
                "value" => 1.4
            ],
            (object)[
                "min" => 64,
                "max" => 71.9,
                "value" => 1.3
            ],
            (object)[
                "min" => 72,
                "max" => 81.9,
                "value" => 1.2
            ]
        ];
        $this->RANGEC = [
            (object)[
                "min" => 10,
                "max" => 11.9,
                "value" => 0.6
            ],
            (object)[
                "min" => 12,
                "max" => 13.9,
                "value" => 0.7
            ],
            (object)[
                "min" => 14,
                "max" => 17.9,
                "value" => 0.8
            ],
            (object)[
                "min" => 18,
                "max" => 22.9,
                "value" => 0.9
            ],
            (object)[
                "min" => 23,
                "max" => 27.9,
                "value" => 1.0
            ],
            (object)[
                "min" => 28,
                "max" => 34.9,
                "value" => 1.1
            ],
            (object)[
                "min" => 35,
                "max" => 43.9,
                "value" => 1.2
            ],
            (object)[
                "min" => 44,
                "max" => 55.9,
                "value" => 1.3
            ],
            (object)[
                "min" => 56,
                "max" => 69.9,
                "value" => 1.4
            ],
            (object)[
                "min" => 70,
                "max" => 87.9,
                "value" => 1.5
            ],
            (object)[
                "min" => 88,
                "max" => 110.9,
                "value" => 1.6
            ],
            (object)[
                "min" => 111,
                "max" => 138.9,
                "value" => 1.7
            ],
            (object)[
                "min" => 139,
                "max" => 174.9,
                "value" => 1.8
            ],
            (object)[
                "min" => 175,
                "max" => 229.9,
                "value" => 1.9
            ],
            (object)[
                "min" => 230,
                "max" => 279.9,
                "value" => 2.0
            ],
            (object)[
                "min" => 280,
                "max" => 349.9,
                "value" => 2.1
            ],
            (object)[
                "min" => 350,
                "max" => 439.9,
                "value" => 2.2
            ],
            (object)[
                "min" => 440,
                "max" => 559.9,
                "value" => 2.3
            ],
            (object)[
                "min" => 560,
                "max" => 699.9,
                "value" => 2.4
            ],
            (object)[
                "min" => 700,
                "max" => 879.9,
                "value" => 2.5
            ],
            (object)[
                "min" => 880,
                "max" => 1000.9,
                "value" => 2.6
            ]
        ];
        $this->RANGED = [
            (object)[
                "min" => 10,
                "max" => 11.9,
                "value" => 1.0
            ],
            (object)[
                "min" => 12,
                "max" => 13.9,
                "value" => 1.1
            ],
            (object)[
                "min" => 14,
                "max" => 17.9,
                "value" => 1.2
            ],
            (object)[
                "min" => 18,
                "max" => 22.9,
                "value" => 1.3
            ],
            (object)[
                "min" => 23,
                "max" => 27.9,
                "value" => 1.4
            ],
            (object)[
                "min" => 28,
                "max" => 35.9,
                "value" => 1.5
            ],
            (object)[
                "min" => 36,
                "max" => 44.9,
                "value" => 1.6
            ],
            (object)[
                "min" => 45,
                "max" => 55.9,
                "value" => 1.7
            ],
            (object)[
                "min" => 56,
                "max" => 69.9,
                "value" => 1.8
            ],
            (object)[
                "min" => 70,
                "max" => 88.9,
                "value" => 1.9
            ],
            (object)[
                "min" => 89,
                "max" => 110.9,
                "value" => 2.0
            ],
            (object)[
                "min" => 111,
                "max" => 138.9,
                "value" => 2.1
            ],
            (object)[
                "min" => 140,
                "max" => 176.9,
                "value" => 2.2
            ],
            (object)[
                "min" => 177,
                "max" => 229.9,
                "value" => 2.3
            ],
            (object)[
                "min" => 230,
                "max" => 279.9,
                "value" => 2.4
            ],
            (object)[
                "min" => 280,
                "max" => 359.9,
                "value" => 2.5
            ],
            (object)[
                "min" => 360,
                "max" => 449.9,
                "value" => 2.6
            ],
            (object)[
                "min" => 450,
                "max" => 559.9,
                "value" => 2.7
            ],
            (object)[
                "min" => 560,
                "max" => 699.9,
                "value" => 2.8
            ],
            (object)[
                "min" => 700,
                "max" => 889.9,
                "value" => 2.9
            ],
            (object)[
                "min" => 890,
                "max" => 1000.9,
                "value" => 3.0
            ],
        ];
    }
    public function GenerateReportSistemsNovaquimica(Request $request)
    {
        $novaJson = $request->novaJson;
        $novaJson = json_decode(json_encode($novaJson, false));
        $pdfs = []; # {system, urlPdf}
        foreach ($novaJson as $k => &$system) {
            $systemObj = new stdClass();
            $systemObj->system = $system->nameSystem;
            foreach ($system->subsystems as $j => &$subsystem) {
                $objRyznar = new stdClass();
                $objRyznar->nameParameter = "Ind. Ryznar";
                $objRyznar->samplingpoints = [];
                $subsystem->graphs = [];
                $graphs = [];
                $subsystem->headers = $this->getAllSamplingPoints($subsystem->parameters);
                foreach ($subsystem->parameters as $p) {
                    $this->prepareFormuleRSI($p, $graphs);
                }
                $this->proccessParameter($subsystem->parameters, $subsystem->headers);
                $this->generateRiznar($objRyznar, $graphs);
                $subsystem->graphs = $graphs;
                $subsystem->parameters[] = $objRyznar;
            }
            $systemObj->urlPDF = $this->generatePDF($system);
            $pdfs[] = $systemObj;
        }
        return Response::make(file_get_contents($pdfs[0]->urlPDF), 200, [
            'content-type' => 'application/pdf',
        ]);
    }
    public function browserShot(Request $request)
    {
        $filename = 'browser.pdf';
        $pdf = Browsershot::url('https://example.com/')
            ->setNodeBinary('PATH %~dp0;%PATH%;')
            ->setNpmBinary('PATH %~dp0;%PATH%;')
            // ->setOption('landscape', true)
            // ->windowSize(3840, 2160)
            // ->waitUntilNetworkIdle()
            ->pdf($filename);
        Storage::disk('public')->put('pdf/' . $filename, $pdf);
    }

    private function prepareFormuleRSI($p, &$graphs)
    {
        $indexGraph = NULL;
        foreach ($p->samplingpoints as $sp) {
            $isAgua = str_contains(strtolower($sp->nameSamplingpoint), strtolower('Agua de reposición'))
                || str_contains(strtolower($sp->nameSamplingpoint), strtolower('Agua de reposicion'));
            if ($isAgua) {
                continue;
            }
            $graph = new stdClass();
            for ($i = 0; $i < count($graphs); $i++) {
                if ($graphs[$i]->nameSamplingpoint === $sp->nameSamplingpoint) {
                    $graph = $graphs[$i];
                    $indexGraph = $i;
                    break;
                }
            }
            if (str_contains(strtolower($p->nameParameter), strtolower('Conductividad'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->conductividad = $sp->finalResult;
                $graph->validRange = $sp->validRange;
            } else if (str_contains(strtolower($p->nameParameter), strtolower('Temperatura'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->temp = $sp->finalResult;
                $graph->validRange = $sp->validRange;
            } else if (str_contains(strtolower($p->nameParameter), strtolower('Dureza'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->dureza = $sp->finalResult;
                $graph->validRange = $sp->validRange;
            } else if (str_contains(strtolower($p->nameParameter), strtolower('ALK TOTAL'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->alk = $sp->finalResult;
                $graph->validRange = $sp->validRange;
            } else if (str_contains(strtolower($p->nameParameter), strtolower('pH'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->ph = $sp->finalResult;
                $graph->validRange = $sp->validRange;
            } else {
                continue;
            }
            // update graphs
            if (is_null($indexGraph)) {
                $graphs[] = $graph;
            } else {
                $graphs[$indexGraph] = $graph;
            }
        }
    }

    private function generateRiznar(&$objRyznar, &$graphs)
    {
        $A = 0;
        $B = 0;
        $C = 0;
        $D = 0;
        $phs = 0;
        $RSI = 0;
        foreach ($graphs as $g) {
            $A = isset($g->conductividad) ? $this->getValue($g->conductividad, $this->RANGEA) : 0; # (log10($g->conductividad * 0.65) - 1) / 10;
            $B = isset($g->temp) ? $this->getValue($g->temp, $this->RANGEB) : 0; # -13.12 * log10($g->temp + 273) + 34.55;
            $C = isset($g->dureza) ? $this->getValue($g->dureza, $this->RANGEC) : 0; # log10($g->dureza * 0.8) - 0.4;
            $D = isset($g->alk) ? $this->getValue($g->alk, $this->RANGED) : 0; # log10($g->alk);
            $phs = (9.4 + $A + $B) - ($C + $D);
            $ph = isset($g->ph) ? $g->ph : 0;
            $RSI = round(2 * $phs - $ph, 1);
            $g->graph = $this->generateGaugeChart($RSI);
            $objRyznar->samplingpoints[] = (object)[
                "nameSamplingpoint" => $g->nameSamplingpoint,
                "validRange" => $g->validRange,
                "finalResult" => $RSI,
                "value" => NULL,
                "codeValue" => NULL,
            ];
        }
    }

    private function getAllSamplingPoints($parameters)
    {
        $headers = [];
        foreach ($parameters as $p) {
            foreach ($p->samplingpoints as $sp) {
                $isInArray = false;
                foreach ($headers as $h) {
                    $isInArray = str_contains(strtolower($sp->nameSamplingpoint), strtolower($h));
                    if ($isInArray) {
                        break;
                    }
                }
                if ($isInArray) {
                    continue;
                }
                $headers[] = $sp->nameSamplingpoint;
            }
        }
        return $headers;
    }

    private function proccessParameter(&$parameters, $headers)
    {
        foreach ($parameters as $k => &$p) {
            $samplingPoints = [];
            $isInArray = false;
            foreach ($headers as $h) {
                foreach ($p->samplingpoints as $k => &$sp) {
                    $isInArray = str_contains(strtolower(trim($sp->nameSamplingpoint)), strtolower(trim($h)));
                    if ($isInArray) {
                        break;
                    }
                }
                if ($isInArray) {
                    $samplingPoints[] = $sp;
                } else {
                    $samplingPoints[] = (object)[
                        "idSamplingpoint" => 8,
                        "nameSamplingpoint" => "",
                        "factor" => 1,
                        "unit" => "",
                        "value" => "",
                        "codeValue" => "",
                        "finalResult" => NULL,
                        "validRange" => false,
                        "valueUser" => NULL,
                        "isCompleted" => true
                    ];
                }
            }
            $p->samplingpoints = $samplingPoints;
        }
    }

    private function getValue($value, array $range)
    {
        $result = 0;
        foreach ($range as $r) {
            if ($r->min <= $value && $r->max >= $value) {
                $result = $r->value;
                break;
            }
        }
        return $result;
    }

    private function generatePDF($system)
    {
        $badges = [
            public_path("/img/bagde-pm-1.png"),
            public_path("/img/bagde-pm-2.png"),
            public_path("/img/bagde-pm-3.png"),
        ];
        $data = [
            "fileName" => "Nombre prueba",
            "logo" => public_path("/storage/novaquimica-logo.jpg"),
            "building" => public_path("/img/building.png"),
            "email" => public_path("/img/email.png"),
            "send" => public_path("/img/send.png"),
            "calendar" => public_path("/img/calendar.png"),
            "imgSystem" => public_path("/img/system.png"),
            "badges" => $badges,
            "rangepm" => public_path("/img/range-pm.png"),
            "bgparameter" => public_path("/img/bg-parameter-slim.png"),
            "imgConclusion" => public_path("/img/checklist.png"),
            "imgRecomendacion" => public_path("/img/check-list.png"),
            "imgProducto" => public_path("/img/productos.png"),
            "system" => $system,
        ];
        $filename = "pdf/" . Str::uuid() . ".pdf";
        $pdf = \PDF::loadView('pdf.report-system', $data);
        $pdf->setOption('margin-top', 10);
        $pdf->setOption('margin-bottom', 10);
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        $pdf->save($filename);
        // liberar el espacio consumido por el chart
        return $filename;
    }

    private function generateGaugeChart($indiceRyznar)
    {
        $VALUES = [
            (object)[
                "min" => 0,
                "max" => 5,
                "label" => "Altamente Incrustante",
                "color" => "rgba(240,44,37,1)"
            ],
            (object)[
                "min" => 5.1,
                "max" => 6,
                "label" => "Ligeramente Incrustante",
                "color" => "rgba(240,236,40,1)"
            ],
            (object)[
                "min" => 6.1,
                "max" => 7,
                "label" => "Equilibrio",
                "color" => "rgba(74,239,59,1)"
            ],
            (object)[
                "min" => 7.1,
                "max" => 7.5,
                "label" => "Ligeramente Corrosiva",
                "color" => "rgba(240,236,40,1)"
            ],
            (object)[
                "min" => 7.6,
                "max" => 10,
                "label" => "Altamente Corrosiva",
                "color" => "rgba(240,44,37,1)"
            ],
        ];
        $color = 'rgba(85,85,85,1)';
        $label = '';
        foreach ($VALUES as $v) {
            if ($v->min <= $indiceRyznar && $v->max >= $indiceRyznar) {
                $color = $v->color;
                $label = $v->label;
            }
        }
        $PI = pi();
        $maxIR = 10;
        $numIR = 10 - $indiceRyznar;
        $chart = new QuickChart(array(
            'width' => 400,
            'height' => 200
        ));

        $configChart = (object)[
            'type' => 'doughnut',
            'data' => [
                'datasets' => [(object)[
                    'label' => 'foo',
                    'data' => [$numIR, $maxIR],
                    'backgroundColor' => [
                        $color,
                        'rgba(217, 217, 217, 1)'
                    ],
                    'borderWidth' => 0,
                ]]
            ],
            'options' => (object)[
                'rotation' => $PI,
                'circumference' => $PI,
                'cutoutPercentage' => 75,
                'plugins' => (object)[
                    'datalabels' => ['display' => false],
                    'doughnutlabel' => [
                        'labels' => [
                            (object)[
                                'text' => "\n$indiceRyznar",
                                'color' => $color,
                                'font' => (object)[
                                    'size' => '40'
                                ],
                            ],
                            (object)[
                                'text' => "\n\n$label",
                                'color' => $color,
                                'font' => (object)[
                                    'size' => '25'
                                ],
                            ],
                        ]
                    ]
                ]
            ]
        ];

        $chart->setConfig(json_encode($configChart));
        $url = $chart->getUrl();
        $contents = file_get_contents($url);
        $gaugeChart = "chart\\" . Str::uuid() . ".png";
        Storage::put("public\\" . $gaugeChart, $contents);
        return $gaugeChart;
    }
}
