<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view-template', function (Request $request) {
    // $novaJson = $request->novaJson;
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
        "logo" => asset("/storage/novaquimica-logo.jpg"),
        "building" => asset("/img/building.png"),
        "email" => asset("/img/email.png"),
        "send" => asset("/img/send.png"),
        "calendar" => asset("/img/calendar.png"),
        "system" => asset("/img/system.png"),
        "bagdepm1" => asset("/img/bagde-pm-1.png"),
        "bagdepm2" => asset("/img/bagde-pm-2.png"),
        "bagdepm3" => asset("/img/bagde-pm-3.png"),
        "rangepm" => asset("/img/range-pm.png"),
        "bgparameter" => asset("/img/bg-parameter-slim.png"),
        "bgtrendleft" => asset("/img/bg-trend-left.png"),
        "bgtrendright" => asset("/img/bg-trend-right.png"),
        "parameters" => $parameters
    ];
    return view('pdf.report-system', $data);
});
