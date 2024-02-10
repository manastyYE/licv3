<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\ClipBoard;

class ClipDate extends Component
{
    public $start_date;
    public $from_date,$to_date;
    public function render()
    {
        return view('livewire..report.clip-date');
    }
    public function showDayly(){

        return redirect()->to('/admin/report/works/orgs-date/'.$this->start_date);
    }
    public function showFromTo(){
        return redirect()->to('/admin/report/works/orgs-date-between/'.$this->from_date .'/'.$this->to_date);
    }
}
