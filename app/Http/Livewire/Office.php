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

        ],[
            'name.required'=>'لا يمكنك ترك اسم القطاع فارغاً',
            'name.unique'=>'اسم القطاع موجود بالفعل ',
        ]);

        //Add Student Data
        $office = new AAA();
        $office->name = $this->name;
        $office->save();

        session()->flash('message', 'تمت عملية اضافة القطاع الجديد بنجاح');

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
        $this->validate([
            'ed_name' => 'required|unique:offices,name,'.$this->office_edit_id,

        ],[
            'ed_name.required'=>'لا يمكنك ترك حقل اسم القطاع فارغاً',
            'ed_name.unique'=>'هذا الاسم متواجد بالفعل ',
        ]);

        $office = AAA::where('id', $this->office_edit_id)->first();
        $office->name = $this->ed_name;

        $office->save();

        session()->flash('message', 'تم تعديل بيانات القطاع بنجاح  ');

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
