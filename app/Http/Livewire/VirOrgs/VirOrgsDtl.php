<?php

namespace App\Http\Livewire\VirOrgs;

use App\Models\VirOrgBillboard;
use App\Models\VirOrgs;
use App\Models\Billboard;
use Livewire\Component;

class VirOrgsDtl extends Component
{
    public $org_id;
    public $billboard_id;
    public $height;
    public $wideth;
    public $count;
    public $bill_edit_id;
    public function render()
    {
        $org_billBoard=VirOrgBillboard::where('vir_org_id',$this->org_id)->get();//where(vir_org_id)
        $org=VirOrgs::find($this->org_id);
        $bill =Billboard::all();
        return view('livewire.vir-orgs.vir-orgs-dtl',['org'=>$org,'org_billBoards'=>$org_billBoard,'bill'=>$bill]);
    }
    public function setvirbill($id){
        $this->bill_edit_id=$id;
        $vir = VirOrgBillboard::find($this->bill_edit_id);
        $this->billboard_id=$vir->billboard_id;
        $this->height=$vir->height;
        $this->wideth=$vir->width;
        $this->count=$vir->count;
    }
    public function resetInputs(){
        $this->bill_edit_id=null;
        $this->height=null;
        $this->wideth=null;
        $this->count=null;
        $this->billboard_id=null;
    }
    public function editOrgBillboardData(){
        $bill = VirOrgBillboard::find($this->bill_edit_id);
        $this->validate([
            'billboard_id'=>'required',
            'height'=>'required|numeric|min:0',
            'wideth'=>'required|numeric|min:0',
            'count'=>'required|integer|min:1',
        ]);
        $bill->billboard_id=$this->billboard_id;
        $bill->height=$this->height;
        $bill->width=$this->wideth;
        $bill->count=$this->count;
        $bill->save();
        session()->flash('message', 'تم تعديل بيانات اللوحة بنجاح ');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');

    }

    public function mount($id){
        $this->org_id=$id;
    }
    public function close(){

    }
}
