<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Billboard;
class Billboardsc extends Component
{
    public function render()
    {
        $bill=Billboard::all();
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
            
        ]);

        //Add Student Data
        $bill_board = new BillBoard();
        $bill_board->name = $this->name;
        $bill_board->price = $this->price;
        $bill_board->save();

        session()->flash('message', 'تمت عملية اضافة وحدة الجوار الجديدة');

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
        // $this->validate([
        //     'no' => 'required|numeric|unique:bill_boards,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

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
