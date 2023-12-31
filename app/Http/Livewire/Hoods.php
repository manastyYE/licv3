<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hood;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
class Hoods extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $this->directorate_id =auth()->guard('admin')->user()->directorate_id;
        $hoods = $this->search ? Hood::where('directorate_id',auth()->guard('admin')->user()->directorate_id)->where('name', 'like', '%' . $this->search . '%')
            ->paginate(12)
            : Hood::where('directorate_id',auth()->guard('admin')->user()->directorate_id)->paginate(12);
        return view('livewire.hoods',['type'=>$hoods]);
    }
    public $name,$directorate_id, $hood_edit_id, $hood_delete_id;


    //Input fields on update validation



    public function storeHoodData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:hoods,name',

        ],
    [
        'name.required'=>'لا يمكنك ترك اسم الحي فارغاً',
        'name.unique'=>'هذا الاسم موجود بالفعل '
    ]);

        //Add Student Data
        $hood = new Hood();
        $hood->name = $this->name;
        $hood->directorate_id=auth()->guard('admin')->user()->directorate_id;
        $hood->save();

        session()->flash('message', 'تمت عملية اضافة الحي الجديد بنجاح');

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
        // on form submit validation
        $this->validate([
            'name' => 'required|unique:hoods,name,'.$this->hood_edit_id, //Validation with ignoring own data

        ],
        [
            'name.required'=>' لا يمكنك ترك اسم الحي فارغاً',
            'name.unique'=>'هذا الاسم موجود بالفعل ',
        ]
    );

        $hood = Hood::where('id', $this->hood_edit_id)->first();
        $hood->name = $this->name;

        $hood->save();

        session()->flash('message', 'تم تعديل بيانات الحي  بنجاح ');

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

        session()->flash('message', 'تم حذف الحي  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->hood_delete_id = '';
    }

    public function cancel()
    {
        $this->hood_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
