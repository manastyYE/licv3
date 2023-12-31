<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BuildingType;
use Livewire\WithPagination;

class Buildings extends Component
{

    use WithPagination;
    public $name;
    public $search;
    public $del_id,$edit_id;
    public function render()
    {
        $buldings = $this->search ? BuildingType::where('name','like', '%' . $this->search . '%')
        ->paginate(10) : BuildingType::paginate(10);
        return view('livewire.buildings',['type'=>$buldings]);
    }
    public function storeData(){
        $this->validate(
            [
                'name'=>'required|unique:building_types,name',
            ],
            [
                'name.required'=>'لا يمكنك ترك اسم نوع المبنى فارغاً',
                'name.unique'=>'هذا الاسم موجود بالفعل ',
            ]);
        $bulding_type = new BuildingType();
        $bulding_type->name = $this->name;
        $bulding_type->save();

        $this->name='';
        $this->dispatchBrowserEvent('close-modal');

    }
    public function setname($id){
        $this->edit_id =$id;
        $b = BuildingType::find($id);

        $this->name = $b->name;

    }
    public function editData(){
        $this->validate(
            [
                'name'=>'required|unique:building_types,,name'.$this->edit_id],
            [
                'name.required'=>'لا يمكنك ترك اسم نوع المبنى فارغاً',
                'name.unique'=>'هذا الاسم موجود بالفعل ',
            ]);

        $ed_data = BuildingType::find($this->edit_id);
        $ed_data->name = $this->name;
        $ed_data->save();

        $this->name ='';
        $this->dispatchBrowserEvent('close-modal');

    }
    public function close(){
        $this->edit_id= '';
        $this->name='';
    }
    public function deleteConfirmation($id)
    {
        $this->del_id = $id; //student id


    }
    public function deleteData()
    {
        $bill_board = BuildingType::where('id', $this->del_id)->first();
        $bill_board->delete();

        session()->flash('message', 'تم حذف نوع البناء بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->del_id = '';
    }
    public function cancel()
    {
        $this->del_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
