<?php

namespace App\Http\Livewire;

use App\Models\HoodUnit;
use App\Models\Street;
use Livewire\Component;
use Livewire\WithPagination;

class Streets extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $street=$this->search ? Street::where('directorate_id',auth()->guard('admin')->user()->directorate_id)
        ->where('name','like','%'.$this->search . '%')->paginate(8)
        : Street::where('directorate_id',auth()->guard('admin')->user()->directorate_id)->paginate(8);

        $hood_units=HoodUnit::where('directorate_id',auth()->guard('admin')->user()->directorate_id)->get();
        return view('livewire.streets',['type'=>$street,'hood_units'=>$hood_units]);
    }
    public $street_id, $name, $hood_unit_id, $street_edit_id, $street_delete_id;
    public $edname,$edhood_unit_id;

    //Input fields on update validation



    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:streets,name',
            'hood_unit_id' => 'required',



        ],[
            'name.required'=>'لا يمكنك ترك اسم الشارع فارغاً' ,
            'name.unique'=>'اسم الشارع موجود بالفعل ',
            'hood_unit_id.required'=>'يجب عليك اختيار وحدة الجوار '
        ]);

        //Add Student Data
        $street = new Street();
        $street->name = $this->name;
        $street->hood_unit_id = $this->hood_unit_id;
        $street->directorate_id= auth()->guard('admin')->user()->directorate_id;
        $street->save();

        session()->flash('message', 'تمت عملية اضافة الشارع الجديد');

        $this->name = '';
        $this->hood_unit_id = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->hood_unit_id = '';
        $this->edname='';
        $this->edhood_unit_id='';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $street = Street::find($id);

        $this->street_edit_id = $street->id;
        $this->street_id = $street->id;
        $this->edname = $street->name;
        $this->edhood_unit_id = $street->hood_unit_id;
    }


    public function editStudentData()
    {
        //on form submit validation
        $this->validate([
            'edname' => 'required|unique:streets,name,'.$this->street_edit_id,
            'edhood_unit_id' => 'required',



        ],[
            'edname.required'=>'لا يمكنك ترك اسم الشارع فارغاً' ,
            'edname.unique'=>'اسم الشارع موجود بالفعل ',
            'edhood_unit_id.required'=>'يجب عليك اختيار وحدة الجوار '
        ]);

        $street = Street::where('id', $this->street_edit_id)->first();
        $street->name = $this->edname;
        $street->hood_unit_id = $this->edhood_unit_id;
        $street->save();

        session()->flash('message', 'تم تعديل بيانات الشارع بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->street_delete_id = $id; //student id


    }

    public function deleteStudentData()
    {
        $street = Street::where('id', $this->street_delete_id)->first();
        $street->delete();

        session()->flash('message', 'تم حذف الشارع  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->street_delete_id = '';
    }

    public function cancel()
    {
        $this->street_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
