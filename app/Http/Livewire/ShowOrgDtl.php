<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;

class ShowOrgDtl extends Component
{
    public $org_id;
    public function render()
    {   $org_billBoard=OrgBillboard::where('org_id',$this->org_id)->get();
        $org=Org::find($this->org_id);
        return view('livewire.show-org-dtl',['org'=>$org,'type'=>$org_billBoard]);
    }
    public function mount($id){
        $this->org_id=$id;
    }
}
