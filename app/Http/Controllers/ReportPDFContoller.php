<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\App;
use App\Models\ClipBoard;
use App\Models\Org;
use Alkoumi\LaravelArabicNumbers\Numbers;

use App\Models\OutherClip;
use Illuminate\Support\Carbon;

class ReportPDFContoller extends Controller
{
    public function showAllHealthClips(){
        $clips =OutherClip::where('office_id',1)->get();
        $total = 0;
        foreach($clips as $clip){
            $total+=$clip->price;
        }
        return view('reports.health.all_health_clips',['health'=>$clips,'total'=>$total]);
    }
    public function showAllCultureClips(){
        $clips =OutherClip::where('office_id',3)->get();
        $total = 0;
        foreach($clips as $clip){
            $total+=$clip->price;
        }
        return view('reports.culture.all_culture_clips',['health'=>$clips,'total'=>$total]);
    }
    public function showAllTourismClips(){
        $clips =OutherClip::where('office_id',2)->get();
        $total = 0;
        foreach($clips as $clip){
            $total+=$clip->price;
        }
        return view('reports.culture.all_culture_clips',['health'=>$clips,'total'=>$total]);
    }
    public function maiClutureReportView(){
        return view('reports.culture.cluture-report');
    }
    public function allClutureOrgs(){
        $org = Org::where('office_id',3)->get();
        return view('reports.culture.all-cluture-orgs',['cluture'=>$org]);
    }
    public function allHealthOrgs(){
        // $org = Org::all();
        // foreach( $org as $o){
        //     $o->office_id = $o->org_type->office->id;
        //     $o->save();
        // }
        $org= Org::where('office_id',1)->get();
        return view('reports.health.all-health-orgs',['health'=>$org]);
    }



    public function mainHealthReportView(){
        return view('reports.health.health-report');
    }
    public function mainTourismReportView(){
        return view('reports.tourism.tourism-report');
    }
    public function allTourismOrgs(){
        $org = Org::where('office_id',2)->get();
        return view('reports.tourism.all-tourism-orgs',['tourism'=>$org]);
    }
    public function allReport(){
        return view('reports.main-report.all-report-view');
    }
    public function mainReport(){
        return view('dashboard.admin.reports');
    }
    public function showOrgReportView(){
        return view('dashboard.reports.orgs_report_');
    }
    public function show_org_date_view(){
        return view('dashboard.reports.orgs_report_date');
    }
    public function show_dayly_report($data){
        $reportdata = ClipBoard::whereBetween('created_at', [$data . ' 00:00:00', $data . ' 23:59:59'])->get();
        return view('reports.orgs-date.orgs_clips_date',['clips'=>$reportdata]);
    }
    public function showFromDateToDate($from_date,$to_date){
        $reportdata = ClipBoard::whereBetween('created_at', [$from_date . ' 00:00:00', $to_date . ' 23:59:59'])->get();
        return view('reports.orgs-date.orgs_clips_date',['clips'=>$reportdata]);
    }
    //
    public function printClip($id){
        $clip = ClipBoard::find($id);
        $ar = $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay + $clip->clean;
        $string_total=Numbers::TafqeetMoney($ar,'YER');
        // if(auth()->guard('admin')->user()->id == 4 || auth()->guard('admin')->user()->id == 5 ||auth()->guard('admin')->user()->id == 7 ){
        //     return view('Automated_clipboard',['id'=>$id])->with('errors','لا يمكنك الوصول الى الصفحة السابقة ');
        // }
        // return view('Automated_clipboard',['id'=>$id])->with('errors','لا يمكنك الوصول الى الصفحة السابقة ');
        if($clip->org->is_stoped ==0){
            return view('reports.autoclip',['clip'=>$clip,'ar_total'=>$string_total]);
        }
        else{
            return redirect()->to('/admin/org/clip/'.$clip->id)->with('error', ' هذه المتشأة موقفة لا يمكن تنفيذ اي عملية عليها  ');
        }


    }
    public function getPayedclip(){
        $clips = ClipBoard::where('clip_status','مدفوعة')->orderBy('ad_reseve')->get();
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
        $clips = ClipBoard::whereHas('org')->where('clip_status','غير مدفوعة')->orderBy('org_id')->get();
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
        $allclip = ClipBoard::whereHas('org')->orderBy('org_id')->get();

        $total_local=0;
        $total_clean =0;
        if($allclip){
            foreach( $allclip as $clip){
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
        $ar = $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay + $clip->clean;
        $string_total=Numbers::TafqeetMoney($ar,'YER');

        return view('reports.card',['clip'=>$clip,'date'=> $today,'total'=>$string_total]);

    }
    public function outherClip($id){
        $clip = OutherClip::find($id);
        $today = Carbon::now();
        $ar = $clip->price+$clip->other_price ;
        $string_total=Numbers::TafqeetMoney($ar,'YER');
        return view('reports.outherclip',['clip'=>$clip,'date'=> $today,'ar_total'=> $string_total]);
    }
}
