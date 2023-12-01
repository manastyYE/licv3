<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\OutherBayment;
class AuthoerPay extends Component
{
    public $name ,$ed_name,$search,$pay_edit_id,$pay_delete_id;

    public function render()
    {
        $pay=OutherBayment::all();
        return view('livewire.authoer-pay',['type'=>$pay]);
    }


    public function storePayData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:hoods,name',

        ]);

        //Add Student Data
        $pay = new OutherBayment();
        $pay->name = $this->name;
        $pay->save();

        session()->flash('message', 'تمت عملية اضافة  نوع المبلغ الجديد');

        $this->name = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->ed_name='';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $pay = OutherBayment::find($id);

        $this->pay_edit_id = $pay->id;
        $this->ed_name = $pay->name;

    }


    public function editPayData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $pay = OutherBayment::where('id', $this->pay_edit_id)->first();
        $pay->name = $this->ed_name;

        $pay->save();

        session()->flash('message', 'تم تعديل بيانات المبلغ الاضافي بنجاح ');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->pay_delete_id = $id; //student id


    }

    public function deletePayData()
    {
        $pay = OutherBayment::where('id', $this->pay_delete_id)->first();
        $pay->delete();

        session()->flash('message', 'تم حذف وحدة نوع المبلغ  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->pay_delete_id = '';
    }

    public function cancel()
    {
        $this->pay_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }

}
