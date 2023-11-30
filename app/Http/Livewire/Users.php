<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    public $fullname,$phone,$password,$search;
    public $ed_fullname,$ed_phone,$ed_password,$ed_user;
    public $user_edit_id, $user_delete_id;
    use WithPagination;
    public function render()
    {
        $user=User::all();
        return view('livewire.users',['type'=>$user]);
    }
    public function save()
    {
        //on form submit validation
        $this->validate([
            'fullname' => 'required|unique:users,fullname',
            'phone' => 'required|numeric|min:9',
            'password'=>'required|min:9',
        ]);

        //Add User Data
        $user = new User();
        $user->fullname = $this->fullname;
        $user->username = $this->phone;
        $user->phone=$this->phone;
        $user->directorate_id = 1;
        $user->roll = 1;
        $user->password = bcrypt($this->password);
        $user->save();

        session()->flash('message', 'تمت عملية اضافة المستخدم الجديد');

        $this->fullname = '';
        $this->password = '';
        $this->phone='';
        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->fullname='';
        $this->phone='';
        $this->password='';
        $this->ed_fullname='';
        $this->ed_phone='';
        $this->ed_password='';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $user = User::find($id);

        $this->user_edit_id = $user->id;
        $this->ed_fullname = $user->fullname;
        $this->ed_password = $user->password;
    }


    public function editUserData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $user = User::where('id', $this->user_edit_id)->first();
        $user->fullname = $this->ed_fullname;
        $user->phone = $this->ed_phone;
        $user->password=$this->ed_password;
        $user->save();

        session()->flash('message', 'تم تعديل بيانات المستخدم بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->user_delete_id = $id; //student id


    }

    public function deleteUserData()
    {
        $street = User::where('id', $this->user_delete_id)->first();
        $street->delete();

        session()->flash('message', 'تم حذف الشارع  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->user_delete_id = '';
    }

    public function cancel()
    {
        $this->user_delete_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }



}
