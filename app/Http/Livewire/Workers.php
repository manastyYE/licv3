<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\Hood;
use App\Models\HoodUnit;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class Workers extends Component
{
    use WithPagination;
    // public $hood_id;
    public $hood_unit;
    public $office_id;
    public $directorate_id  ;
    public $username,$fullname,$phone,$password,$edit_id,$del_id;
    public $search;
    public $supervisor_id,$role_no;

    public function render()
    {
        $office = Office::all();
        $hood_units = HoodUnit::all();
        $workers = $this->search ? Worker::with('supervisor')->orderBy('created_at','desc')
        ->where('fullname','like','%'.$this->search . '%')
        ->orWhere('phone','like','%'.$this->search . '%')
        ->orwhere('username','like','%'.$this->search . '%')
        ->paginate(8) : Worker::with('supervisor')->orderBy('created_at','desc')->paginate(8);
        $supervisors = Worker::where('role_no',2)->where('id','!=',$this->edit_id)->select('id','fullname')->get();
        return view('livewire.workers',['hood_units' => $hood_units,'office'=>$office,'workers'=>$workers,'supervisors' => $supervisors]);
    }
    public function save()
    {

        //on form submit validation
        $this->validate([
            'fullname' => 'required|unique:users,fullname',
            'phone' => 'required|numeric|min:9',
            'password'=>'required|min:8',
            'username'=>'required|unique:workers,username',
            'hood_unit'=>'required',
            'office_id'=>'required',
            'role_no'=>'required',
        ],[
            'fullname.required'=>'لا يمكنك ترك حقل الاسم الكامل فارغاً',
            'fullname.unique'=>'هذا الاسم متواجد بالفعل ',
            'phone.required'=>'لا يمكنك ترك حقل رقم الهاتف فارغاً',
            'phone.numeric'=>'لا يمكن ان يحتوي حقل رقم الهاتف على احرف او رموز',
            'phone.min'=>'يجب ان يكون رقم الهاتف مكون من 9 ارقام ',
            'password.required'=>'لا يمكن ترك حقل كلمة المرور فارغاً',
            'password.min'=>'يجب ان تكون كلمة المرور من 8 احرف او اكثر ',
            'username.required'=>'لا يمكن ترك حقل اسم المستخدم فارغاً',
            'username.unique'=>'اسم المستخدم موجود بالفعل ',
            'hood_unit.required'=>'يجب عليك تحديد وحدات الجوار',
            'role_no.required'=>'يجب عليك اختيار نوع المستخدم',
        ]);
        if ($this->role_no == 1) {
            $this->validate(['supervisor_id' => 'required']);
        }
        //Add User Data
        $worker = new Worker();
        $worker->fullname = $this->fullname;
        $worker->username = $this->username;
        $worker->phone=$this->phone;
        $worker->directorate_id = auth()->guard('admin')->user()->directorate_id;
        $worker->password = Hash::make($this->password);
        $worker->hood_units=json_encode($this->hood_unit);
        $worker->office_id= $this->office_id;
        if($this->supervisor_id){
            $worker->supervisor_id = $this->supervisor_id;
        }
        $worker->role_no = $this->role_no;
        $worker->save();


        $this->fullname = '';
        $this->password = '';
        $this->phone='';
        $this->username='';
        $this->hood_unit='';
        $this->office_id='';
        $this->supervisor_id=null;

        session()->flash('message', 'تمت عملية اضافة المفتش الجديد');
        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->fullname = '';
        $this->password = '';
        $this->phone='';
        $this->username='';
        $this->hood_unit='';
        $this->office_id='';
        $this->supervisor_id=null;
        $this->edit_id = '';
        $this->role_no = '';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id){
        $worker = Worker::find($id);

        $this->edit_id = $worker->id;
        $this->fullname = $worker->fullname;
        $this->username = $worker->username;
        $this->password = $worker->password;
        $this->phone = $worker->phone;
        $this->hood_unit = json_decode($worker->hood_units);
        $this->office_id = $worker->office_id;
        $this->supervisor_id = $worker->supervisor_id;
        $this->role_no = $worker->role_no;

    }


    public function editWorkerData()
    {
        //on form submit validation
        $this->validate([
            'fullname' => 'required|unique:users,fullname,'.$this->edit_id,
            'phone' => 'required|numeric|min:9',
            'password'=>'required|min:8',
            'username'=>'required|unique:workers,username,'.$this->edit_id,
            'hood_unit'=>'required',
            'office_id'=>'required',
            'role_no'=>'required',
        ],[
            'fullname.required'=>'لا يمكنك ترك حقل الاسم الكامل فارغاً',
            'fullname.unique'=>'هذا الاسم متواجد بالفعل ',
            'phone.required'=>'لا يمكنك ترك حقل رقم الهاتف فارغاً',
            'phone.numeric'=>'لا يمكن ان يحتوي حقل رقم الهاتف على احرف او رموز',
            'phone.min'=>'يجب ان يكون رقم الهاتف مكون من 9 ارقام ',
            'password.required'=>'لا يمكن ترك حقل كلمة المرور فارغاً',
            'password.min'=>'يجب ان تكون كلمة المرور من 8 احرف او اكثر ',
            'username.required'=>'لا يمكن ترك حقل اسم المستخدم فارغاً',
            'username.unique'=>'اسم المستخدم موجود بالفعل ',
            'hood_unit.required'=>'يجب عليك تحديد وحدات الجوار',
            'role_no.required'=>'يجب عليك اختيار نوع المستخدم',
        ]);
        if ($this->role_no == 1) {
            $this->validate(['supervisor_id' => 'required']);
        }

        $worker = Worker::where('id', $this->edit_id)->first();
        $worker->fullname = $this->fullname;
        $worker->phone = $this->phone;
        if($this->password != $worker->password){
            $worker->password = Hash::make($this->password);
        }
        $worker->hood_units = json_encode($this->hood_unit);
        $worker->username = $this->username;
        $worker->office_id = $this->office_id;
        $worker->supervisor_id = $this->supervisor_id;
        $worker->role_no = $this->role_no;
        $worker->save();

        session()->flash('message', 'تم تعديل بيانات المفتش بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->del_id = $id; //student id
    }

    public function deleteWorkerData()
    {
        $worker = Worker::where('id', $this->del_id)->first();
        $worker->delete();

        session()->flash('message', 'تم حذف بيانات المفتش  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->del_id = '';
    }

    public function cancel()
    {
        $this->del_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }



}
