<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class ReportPDFContoller extends Controller
{
    //
    public function gen_pdf(){
    $pdf = Pdf::loadView('reports.index');
    return $pdf->download('invoice.pdf');

    }
}
