<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hood;
use Illuminate\Support\Facades\Auth;

class Hoods extends Component
{
    public function render()
    {
        $this->directorate_id =auth()->guard('admin')->user()->directorate_id;
        $hoods=Hood::where('directorate_id',auth()->guard('admin')->user()->directorate_id)->get();
        return view('livewire.hoods',['type'=>$hoods]);
    }
    public $name,$directorate_id, $hood_edit_id, $hood_delete_id;


    //Input fields on update validation



    public function storeHoodData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:hoods,name',

        ]);

        //Add Student Data
        $hood = new Hood();
        $hood->name = $this->name;
        $hood->directorate_id=auth()->guard('admin')->user()->directorate_id;
        $hood->save();

        session()->flash('message', 'تمت عملية اضافة وحدة الجوار الجديدة');

        $this->name = '';

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
        $hood = Hood::find($id);

        $this->hood_edit_id = $hood->id;
        $this->name = $hood->name;

    }


    public function editHoodData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $hood = Hood::where('id', $this->hood_edit_id)->first();
        $hood->name = $this->name;

        $hood->save();

        session()->flash('message', 'تم تعديل بيانات وحدة الجوار بنجاح ');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->hood_delete_id = $id; //student id


    }

    public function deleteHoodData()
    {
        $hood = Hood::where('id', $this->hood_delete_id)->first();
        $hood->delete();

        session()->flash('message', 'تم حذف وحدة الجوار  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->hood_delete_id = '';
    }

    public function cancel()
    {
        $this->hood_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
