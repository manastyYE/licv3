<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\ClipBoard;
use App\models\Org;
use Alkoumi\LaravelArabicNumbers\Numbers;
use App\Models\OutherClip;
use Illuminate\Support\Carbon;

class ReportPDFContoller extends Controller
{
    public function mainReport(){
        return view('dashboard.admin.reports');
    }
    public function showOrgReportView(){
        return view('dashboard.reports.orgs_report_');
    }
    //
    public function printClip($id){
        $clip = ClipBoard::find($id);
        $ar = $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay + $clip->clean;
        $string_total=Numbers::TafqeetMoney($ar,'YER');
        // if(auth()->guard('admin')->user()->id == 4 || auth()->guard('admin')->user()->id == 5 ||auth()->guard('admin')->user()->id == 7 ){
        //     return view('Automated_clipboard',['id'=>$id])->with('errors','لا يمكنك الوصول الى الصفحة السابقة ');
        // }
        return view('reports.autoclip',['clip'=>$clip,'ar_total'=>$string_total]);

    }
    public function getPayedclip(){
        $clips = ClipBoard::where('clip_status','مدفوعة')->get();
        $total_local=0;
        $total_clean =0;
        if($clips){
            foreach( $clips as $clip){
                $total_local +=$clip->local_fee ;
                $total_clean += $clip->clean + $clip->total_ad +$clip->clean_pay ;
            }
        }
        $total=[
            'clean'=>$total_clean,
            'local'=>$total_local,
        ];
        return view('reports.allautoclip',['clips'=>$clips,'total'=>$total]);
    }
    public function getNPayedclip(){
        $clips = ClipBoard::whereHas('org')->where('clip_status','غير مدفوعة')->get();
        $total_local=0;
        $total_clean =0;
        if($clips){
            foreach( $clips as $clip){
                $total_local +=$clip->local_fee ;
                $total_clean += $clip->clean + $clip->total_ad +$clip->clean_pay ;
            }
        }
        $total=[
            'clean'=>$total_clean,
            'local'=>$total_local,
        ];
        return view('reports.allautoclip',['clips'=>$clips,'total'=>$total]);
    }
    public function getAllclip(){
        $allclip = ClipBoard::whereHas('org')->get();
        $clips = ClipBoard::where('org_id','>=',1 )->get();
        $total_local=0;
        $total_clean =0;
        if($clips){
            foreach( $clips as $clip){
                $total_local +=$clip->local_fee ;
                $total_clean += $clip->clean + $clip->total_ad +$clip->clean_pay ;

            }
        }
        $total=[
            'clean'=>$total_clean,
            'local'=>$total_local,
        ];
        return view('reports.all_clips',['allclips'=>$allclip,'total'=>$total]);
    }
    public function printCard($id){
        $clip = ClipBoard::find($id);
        $today = Carbon::now();

        return view('reports.card',['clip'=>$clip,'date'=> $today]);

    }
    public function outherClip($id){
        $clip = OutherClip::find($id);
        $today = Carbon::now();
        $ar = $clip->price+$clip->other_price ;
        $string_total=Numbers::TafqeetMoney($ar,'YER');
        return view('reports.outherclip',['clip'=>$clip,'date'=> $today,'ar_total'=> $string_total]);
    }
}
