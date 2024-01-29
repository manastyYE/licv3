<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\ClipBoard;

class ClipDate extends Component
{
    public $start_date;
    public function render()
    {
        return view('livewire..report.clip-date');
    }
    public function showDayly(){

        return redirect()->to('/admin/report/works/orgs-date/'.$this->start_date);
    }
}
