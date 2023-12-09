<?php

namespace App\Http\Livewire\VirOrgs;

use App\Models\VirOrgBillboard;
use App\Models\VirOrgs;
use Livewire\Component;

class VirOrgsDtl extends Component
{
    public $org_id;
    public function render()
    {
        $org_billBoard=VirOrgBillboard::where('vir_org_id',$this->org_id)->get();//where(vir_org_id)
        $org=VirOrgs::find($this->org_id);
        return view('livewire.vir-orgs.vir-orgs-dtl',['org'=>$org,'org_billBoards'=>$org_billBoard]);
    }
    public function mount($id){
        $this->org_id=$id;
    }
}
