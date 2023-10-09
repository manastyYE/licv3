<?php

namespace App\Http\Livewire;

use App\Models\Billboard;
use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;

class ShowOrgDtl extends Component
{
    public $org_id;
    public $billboard_id, $height, $wideth, $count, $edit_billboard_id,$del_billboard_id;
    public $ed_billboard_id, $ed_height, $ed_wideth, $ed_count;
    public function render()
    {   $org_billBoard=OrgBillboard::where('org_id',$this->org_id)->get();
        $org=Org::find($this->org_id);
        $bill_board = Billboard::all();
        return view('livewire.show-org-dtl',['org'=>$org,'type'=>$org_billBoard,'bill'=>$bill_board]);
    }
    public function mount($id){
        $this->org_id=$id;
    }
    public function storeOrgBillBoardData()
    {
        //on form submit validation
        $this->validate([
            

            
            'billboard_id' => 'required',
            'height' => 'required',
            'wideth'=>'required|numeric',
            'count'=>'required|numeric',

        ]);

        //Add Student Data
        $orgbillboard = new OrgBillboard();
        $orgbillboard->org_id = $this->org_id;
        $orgbillboard->billboard_id = $this->billboard_id;
        $orgbillboard->height = $this->height;
        $orgbillboard->width = $this->wideth;
        $orgbillboard->count = $this->count;
        $orgbillboard->save();

        session()->flash('message', 'تمت عملية اضافة اللوحة الجديدة');

        $this->billboard_id = '';
        $this->height = '';
        $this->wideth = '';
        $this->count = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->billboard_id = '';
        $this->height = '';
        $this->wideth = '';
        $this->count = '';
        $this->ed_billboard_id = '';
        $this->ed_height = '';
        $this->ed_wideth = '';
        $this->ed_count = '';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id)
    {
        $orgbillboard = OrgBillboard::find($id);

        $this->edit_billboard_id = $orgbillboard->id;
        
        $this->ed_billboard_id = $orgbillboard->id;
        $this->ed_height = $orgbillboard->height;
        $this->ed_wideth = $orgbillboard->wideth;
        $this->ed_count = $orgbillboard->count;
    }


    public function editOrgBillboardData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);
        // 'org_id',
        // 'billboard_id',
        // 'height',
        // 'wideth',
        // 'count',

        $bill_board_ed = OrgBillboard::where('id', $this->edit_billboard_id)->first();
        $bill_board_ed->billboard_id = $this->ed_billboard_id;
        $bill_board_ed->height = $this->ed_height;
        $bill_board_ed->wideth = $this->ed_wideth;
        $bill_board_ed->count = $this->ed_count;
        $bill_board_ed->save();

        session()->flash('message', 'تم تعديل بيانات اللوحة بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->del_billboard_id = $id; //student id


    }

    public function deleteOrgBillboardData()
    {
        $orgBillboard = OrgBillboard::where('id', $this->del_billboard_id)->first();
        $orgBillboard->delete();

        session()->flash('message', 'تم حذف النشاط  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->del_billboard_id = '';
    }

    public function cancel()
    {
        $this->del_billboard_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }

}
