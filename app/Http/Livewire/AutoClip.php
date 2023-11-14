<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;
class AutoClip extends Component
{
    public $org_id;
    public function render()
    {
        $org= Org::find($this->org_id);
        $board = OrgBillboard::where('org_id', $this->org_id)->get();
        return view('livewire.auto-clip',['org'=>$org]);
    }
    public function mount($id){
        $this->org_id = $id;
    }
}
