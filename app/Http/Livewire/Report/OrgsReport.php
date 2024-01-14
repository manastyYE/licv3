<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;

class OrgsReport extends Component
{
    public $report_type;
    public function render()
    {
        return view('livewire..report.orgs-report');
    }
    public function show(){
        $this->validate([
            'report_type'=>'required'
        ],[
            'report_type.required'=>'يجب عليك اختيار نوع التقرير'
        ]);
        if($this->report_type==1){
            return redirect()->to('/admin/report/clips/all');
        }
        if($this->report_type==2){
            return redirect()->to('/admin/report/clips/pay');
        }
        if($this->report_type==3){
            return redirect()->to('/admin/report/clips/npay');
        }

    }
}
