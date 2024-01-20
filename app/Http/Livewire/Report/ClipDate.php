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
        $data = ClipBoard::whereBetween('created_at', [$this->start_date . ' 00:00:00', $this->start_date . ' 23:59:59'])->get();
        return redirect()->to('/admin/report/orgs-date/'.$data);
    }
}
