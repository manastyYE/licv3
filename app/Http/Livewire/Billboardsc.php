<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Billboard;
use Livewire\WithPagination;
class Billboardsc extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {

        $bill =$this->search ? Billboard::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->paginate(12)
            : Billboard::paginate(12);
        return view('livewire.billboardsc',['type'=>$bill]);
    }
    public $name,$price, $bill_board_edit_id, $bill_board_delete_id;
    public $ed_name,$ed_price;

    //Input fields on update validation



    public function storeBillBoardData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required|unique:billboards,name',
            'price'=>'required|numeric'

        ],[
            'name.required'=>'لا يمكن ترك اسم اللوحة فارغاً',
            'name.unique'=>'هذا الاسم متواجد بالفعل لا يمكن التكرار ',
            'price.required'=>'لا يمكنك ترك سعر المتر فارغاً',
            'price.numeric'=>'يجب ان لا يحتوي حقل سعر المتر المربع على احرف او رموز',
        ]);

        //Add Student Data
        $bill_board = new BillBoard();
        $bill_board->name = $this->name;
        $bill_board->price = $this->price;
        $bill_board->save();

        session()->flash('message', 'تمت عملية اضافة اللوحة الجديدة');

        $this->name = '';
        $this->price = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->price = '';
        $this->ed_name = '';
        $this->ed_price = '';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $bill_board = BillBoard::find($id);

        $this->bill_board_edit_id = $bill_board->id;
        $this->ed_name = $bill_board->name;
        $this->ed_price=$bill_board->price;
    }


    public function editBillBoardData()
    {
        //on form submit validation
        $this->validate([
            'ed_name' => 'required|unique:billboards,name,'.$this->bill_board_edit_id, //Validation with ignoring own data
            'ed_price' => 'required|numeric',

        ],[
            'ed_name.required'=>'لا يمكن ترك اسم اللوحة فارغاً',
            'ed_name.unique'=>'هذا الاسم موجود بالفعل ',
            'ed_price.required'=>'لا يمكن ترك سعر المتر فارغاً',
            'ed_price.numeric'=>'يجب أن لا يحتوي السعر على احرف او رموز',
        ]);

        $bill_board = BillBoard::where('id', $this->bill_board_edit_id)->first();
        $bill_board->name = $this->ed_name;
        $bill_board->price = $this->ed_price;
        $bill_board->save();

        session()->flash('message', 'تم تعديل بيانات اللوحة بنجاح ');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->bill_board_delete_id = $id; //student id


    }

    public function deleteBillBoardData()
    {
        $bill_board = BillBoard::where('id', $this->bill_board_delete_id)->first();
        $bill_board->delete();

        session()->flash('message', 'تم حذف اللوحة بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->bill_board_delete_id = '';
    }

    public function cancel()
    {
        $this->bill_board_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
