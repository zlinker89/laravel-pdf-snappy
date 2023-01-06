<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class PDFController extends Controller
{
    public function GenerateReportSistemsNovaquimica(Request $request)
    {
        $filename = 'pdf/test.pdf';
        $novaJson = $request->novaJson;
        $parameters = [
            "pH",
            "ALK - FENOL",
            "ALK - TOTAL",
            "ALK - OH",
            "Dureza total, ppm",
            "Conductividad, μs/cm.",
            "S.T.D ppm",
            "S.T.Polimero, ppm",
            "Sulfitos, SO3 ppm.",
            "Hierro T. ppm.",
            "Cloruros, Cl",
            "Ciclos, Concent.",
        ];
        $data = [
            "fileName" => "Nombre prueba",
            "logo" => public_path("/storage/novaquimica-logo.jpg"),
            "building" => public_path("/img/building.png"),
            "email" => public_path("/img/email.png"),
            "send" => public_path("/img/send.png"),
            "calendar" => public_path("/img/calendar.png"),
            "system" => public_path("/img/system.png"),
            "bagdepm1" => public_path("/img/bagde-pm-1.png"),
            "bagdepm2" => public_path("/img/bagde-pm-2.png"),
            "bagdepm3" => public_path("/img/bagde-pm-3.png"),
            "rangepm" => public_path("/img/range-pm.png"),
            "bgparameter" => public_path("/img/bg-parameter-slim.png"),
            "bgtrendleft" => public_path("/img/bg-trend-left.png"),
            "bgtrendright" => public_path("/img/bg-trend-right.png"),
            "parameters" => $parameters
        ];
        // $html = view('pdf.report-system', $data)->render();
        File::delete($filename);
        $pdf = \PDF::loadView('pdf.report-system', $data);
        $pdf->setOption('enable-javascript', true);
        // $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $pdf->setOption('margin-top', 10);
        $pdf->setOption('margin-bottom', 10);
        $pdf->setOption('margin-left', 0);
        $pdf->setOption('margin-right', 0);
        $pdf->save($filename);
        return Response::make(file_get_contents($filename), 200, [
            'content-type'=>'application/pdf',
        ]);
    }
}
