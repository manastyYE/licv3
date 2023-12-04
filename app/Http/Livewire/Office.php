<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office as AAA;


class Office extends Component
{
    public function render()
    {
        $office= AAA::all();
        return view('livewire.office',['type'=>$office]);
    }
     public $name, $office_edit_id, $ed_name,$office_delete_id;


    //Input fields on update validation



    public function storeOfficeData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:offices,name',

        ]);

        //Add Student Data
        $office = new AAA();
        $office->name = $this->name;
        $office->save();

        session()->flash('message', 'تمت عملية اضافة القطاع الجديد');

        $this->name = '';
        $this->ed_name='';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';

    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $office = AAA::find($id);

        $this->office_edit_id = $office->id;
        $this->ed_name = $office->name;

    }



    public function editOfficeData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $office = AAA::where('id', $this->office_edit_id)->first();
        $office->name = $this->ed_name;

        $office->save();

        session()->flash('message', 'تم تعديل بيانات وحدة الجوار بنجاح ');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->office_delete_id = $id; //student id


    }

    public function deleteOfficeData()
    {
        $office = AAA::where('id', $this->office_delete_id)->first();
        $office->delete();

        session()->flash('message', 'تم حذف وحدة  القطاع بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->office_delete_id = '';
    }

    public function cancel()
    {
        $this->office_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
