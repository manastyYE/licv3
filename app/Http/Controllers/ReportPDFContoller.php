<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\ClipBoard;
use Alkoumi\LaravelArabicNumbers\Numbers;

class ReportPDFContoller extends Controller
{
    //
    public function printClip($id){
        $clip = ClipBoard::find($id);
        $ar = $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay;
        $string_total=Numbers::TafqeetMoney($ar,'YER');
        return view('reports.autoclip',['clip'=>$clip,'ar_total'=>$string_total]);

    }
}
