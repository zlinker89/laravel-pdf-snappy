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
    public function GenerateReportSistemsNovaquimica(Request $request)
    {
        $novaJson = $request->novaJson;
        $novaJson = json_decode(json_encode($novaJson, false));
        $pdfs = []; # {system, urlPdf}
        foreach ($novaJson as $system) {
            $systemObj = new stdClass();
            $systemObj->system = $system->nameSystem;
            foreach ($system->subsystems as $subsystem) {
                $objRyznar = new stdClass();
                $objRyznar->nameParameter = "Ind. Ryznar";
                $objRyznar->samplingpoints = [];
                $subsystem->graphs = [];
                $graphs = [];
                foreach ($subsystem->parameters as $p) {
                    $this->prepareFormuleRSI($p, $graphs);
                }
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
            $graph = new stdClass();
            for ($i=0; $i < count($graphs) ; $i++) {
                if ($graphs[$i]->nameSamplingpoint === $sp->nameSamplingpoint) {
                    $graph = $graphs[$i];
                    $indexGraph = $i;
                    break;
                }
            }
            if (str_contains(strtolower($p->nameParameter), strtolower('Conductividad'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->conductividad = $sp->finalResult;
            }else if (str_contains(strtolower($p->nameParameter), strtolower('Temperatura'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->temp = $sp->finalResult;
            }else if (str_contains(strtolower($p->nameParameter), strtolower('Dureza'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->dureza = $sp->finalResult;
            }else if (str_contains(strtolower($p->nameParameter), strtolower('ALK TOTAL'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->alk = $sp->finalResult;
            }else if (str_contains(strtolower($p->nameParameter), strtolower('pH'))) {
                $graph->nameSamplingpoint = $sp->nameSamplingpoint;
                $graph->ph = $sp->finalResult;
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
            $A = (log10($g->conductividad * 0.65) - 1) / 10;
            $B = -13.12 * log10($g->temp + 273) + 34.55;
            $C = log10($g->dureza * 0.8) - 0.4;
            $D = log10($g->alk);
            $phs = (9.4 + $A + $B) - ($C + $D);
            $RSI = round(2 * $phs - $g->ph, 1);
            $g->graph = $this->generateGaugeChart($RSI);
            $objRyznar->samplingpoints[] = (object)[
                "nameSamplingpoint" => $g->nameSamplingpoint,
                "finalResult" => $RSI,
                "value" => NULL,
                "codeValue" => NULL,
            ];
        }
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
                "min" => 4,
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
                "label" => "Ligeramente Incrustante",
                "color" => "rgba(240,236,40,1)"
            ],
            (object)[
                "min" => 7.6,
                "max" => 8.5,
                "label" => "Altamente Incrustante",
                "color" => "rgba(240,44,37,1)"
            ],
        ];
        $color = 'rgba(85,85,85,1)';
        $label = '';
        foreach ($VALUES as $v) {
            if ($v->min >= $indiceRyznar && $v->max <= $indiceRyznar) {
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
                                'text' => $label,
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
