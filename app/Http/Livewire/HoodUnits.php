<?php

namespace App\Http\Livewire;

use App\Models\HoodUnit;
use Livewire\Component;

class HoodUnits extends Component
{
    public function render()
    {   $hood=HoodUnit::all();
        return view('livewire.hood-units',['type'=>$hood]);
    }
    public $no, $hood_unit_edit_id, $hood_unit_delete_id;
    public $ed_no;

    //Input fields on update validation
    


    public function storeHoodUnitData()
    {
        //on form submit validation
        $this->validate([
            'no' => 'required|unique:hood_units,no',
            
        ]);

        //Add Student Data
        $hood_unit = new HoodUnit();
        $hood_unit->no = $this->no;
        $hood_unit->save();

        session()->flash('message', 'تمت عملية اضافة وحدة الجوار الجديدة');

        $this->no = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->no = '';
        $this->ed_no = '';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $hood_unit = HoodUnit::find($id);

        $this->hood_unit_edit_id = $hood_unit->id;
        $this->ed_no = $hood_unit->no;
    }
    
    
    public function editHoodUnitData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $hood_unit = HoodUnit::where('id', $this->hood_unit_edit_id)->first();
        $hood_unit->no = $this->no;
        $hood_unit->save();

        session()->flash('message', 'تم تعديل بيانات وحدة الجوار بنجاح ');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->hood_unit_delete_id = $id; //student id

    
    }

    public function deleteHoodUnitData()
    {
        $hood_unit = HoodUnit::where('id', $this->hood_unit_delete_id)->first();
        $hood_unit->delete();

        session()->flash('message', 'تم حذف وحدة الجوار  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->hood_unit_delete_id = '';
    }

    public function cancel()
    {
        $this->hood_unit_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
