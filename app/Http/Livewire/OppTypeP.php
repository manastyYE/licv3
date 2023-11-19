<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrgType;
use App\Models\Office;

class OppTypeP extends Component
{
    public function render()
    {
        $off = Office::all();
        $opp_type=OrgType::all();
        return view('livewire.opp-type-p',['type'=>$opp_type,'off'=>$off]);
    }
    public $orgtype_id, $name,$office_id, $price, $orgtype_edit_id, $orgtype_delete_id;
    public $edname,$edprice,$ed_office_id;

    //Input fields on update validation



    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:org_types,name',
            'price' => 'required',



        ]);

        //Add Student Data
        $orgtype = new orgtype();
        $orgtype->name = $this->name;
        $orgtype->price = $this->price;
        $orgtype->office_id = $this->office_id;
        $orgtype->save();

        session()->flash('message', 'تمت عملية اضافة النشاط التجاري');

        $this->name = '';
        $this->price = '';
        $this->office_id = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->price = '';
        $this->office_id = '';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $orgtype = OrgType::find($id);

        $this->orgtype_edit_id = $orgtype->id;
        $this->orgtype_id = $orgtype->id;
        $this->edname = $orgtype->name;
        $this->edprice = $orgtype->price;
        $this->office_id= $orgtype->office_id;
    }


    public function editStudentData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $orgtype = OrgType::where('id', $this->orgtype_edit_id)->first();
        $orgtype->name = $this->edname;
        $orgtype->price = $this->edprice;
        $orgtype->office_id = $this->ed_office_id;
        $orgtype->save();

        session()->flash('message', 'تم تعديل بيانات النشاط بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->orgtype_delete_id = $id; //student id


    }

    public function deleteStudentData()
    {
        $orgtype = OrgType::where('id', $this->orgtype_delete_id)->first();
        $orgtype->delete();

        session()->flash('message', 'تم حذف النشاط  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->orgtype_delete_id = '';
    }

    public function cancel()
    {
        $this->orgtype_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }

}

