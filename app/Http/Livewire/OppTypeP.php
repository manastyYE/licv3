<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrgType;
use App\Models\Office;
use Livewire\WithPagination;
class OppTypeP extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $off = Office::all();
        $opp_type=OrgType::all();
        $opp_type = $this->search ? OrgType::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->paginate(12)
            : OrgType::paginate(12);
        return view('livewire.opp-type-p',['type'=>$opp_type,'off'=>$off]);
    }
    public $orgtype_id, $name,$office_id, $price ,$local_fee, $orgtype_edit_id, $orgtype_delete_id;
    public $edname,$edprice,$ed_office_id,$ed_local_fee;

    //Input fields on update validation



    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'office_id'=>'required',
            'name' => 'required|unique:org_types,name',
            'price' => 'required|numeric',
            'local_fee'=>'required|numeric',



        ],[
            'office_id.required'=>'يجب عليك اختيار القطاع الخاص بنوع النشاط',
            'name.required'=>'لا يمكنك ترك اسم النشاط  فارغاً',
            'name.unique'=>'اسم النشاط موجود بالفعل ',
            'price.required'=>'لا يمكنك ترك حقل رسوم النظافة فارغاً',
            'price.numeric'=>'حقل رسوم النظافة لا يقبل الاحرف او الرموز',
            'local_fee.required'=>'لا يمكن ترك حقل الرسوم المحلية فارغاً',
            'local_fee.numeric'=>'لا يمكن ان يحتوي حقل الرسوم المحلية على احرف او رموز'
        ]);

        //Add Student Data
        $orgtype = new orgtype();
        $orgtype->name = $this->name;
        $orgtype->price = $this->price;
        $orgtype->office_id = $this->office_id;
        $orgtype->local_fee = $this->local_fee;
        $orgtype->save();

        session()->flash('message', 'تمت عملية اضافة النشاط التجاري');

        $this->name = '';
        $this->price = '';
        $this->office_id = '';
        $this->local_fee = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->price = '';
        $this->office_id = '';
        $this->local_fee = '';
        $this->ed_local_fee ='';
        $this->edname = '';
        $this->ed_office_id = '';
        $this->edprice ='';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $orgtype = OrgType::find($id);

        $this->orgtype_edit_id = $orgtype->id;
        $this->orgtype_id = $orgtype->id;
        $this->edname = $orgtype->name;
        $this->edprice = $orgtype->price;
        $this->ed_office_id= $orgtype->office_id;
        $this->ed_local_fee = $orgtype->local_fee;
    }


    public function editStudentData()
    {
        //on form submit validation
        $this->validate(
            [
            'ed_office_id'=>'required',
            'edname' => 'required|unique:org_types,name,'.$this->orgtype_edit_id,
            'edprice' => 'required|numeric',
            'ed_local_fee'=>'required|numeric',



            ],[
                'ed_office_id.required'=>'يجب عليك اختيار القطاع الخاص بنوع النشاط',
                'edname.required'=>'لا يمكنك ترك اسم النشاط  فارغاً',
                'edname.unique'=>'اسم النشاط موجود بالفعل ',
                'edprice.required'=>'لا يمكنك ترك حقل رسوم النظافة فارغاً',
                'edprice.numeric'=>'حقل رسوم النظافة لا يقبل الاحرف او الرموز',
                'ed_local_fee.required'=>'لا يمكن ترك حقل الرسوم المحلية فارغاً',
                'ed_local_fee.numeric'=>'لا يمكن ان يحتوي حقل الرسوم المحلية على احرف او رموز'
            ]
        );

        $orgtype = OrgType::where('id', $this->orgtype_edit_id)->first();
        $orgtype->name = $this->edname;
        $orgtype->price = $this->edprice;
        $orgtype->office_id = $this->ed_office_id;
        $orgtype->local_fee = $this->ed_local_fee;
        $orgtype->save();

        session()->flash('message', 'تم تعديل بيانات النشاط بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->orgtype_delete_id = $id; //student id


    }

    public function deleteStudentData()
    {
        $orgtype = OrgType::where('id', $this->orgtype_delete_id)->first();
        $orgtype->delete();

        session()->flash('message', 'تم حذف النشاط  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->orgtype_delete_id = '';
    }

    public function cancel()
    {
        $this->orgtype_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }

}

