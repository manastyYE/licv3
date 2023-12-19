<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Office;
use App\Models\Hood;
use App\Models\HoodUnit;
use App\Models\Worker;
use Illuminate\Support\Facades\Hash;

class Workers extends Component
{
    // public $hood_id;
    public $hood_unit;
    public $office_id;
    public $directorate_id  ;
    public $hood_id;
    public $username,$fullname,$phone,$password,$edit_id,$del_id;

    public function render()
    {
        // $hood = Hood::where('directorate_id',auth()->guard('admin')->user()->directorate_id)->get();
        $office = Office::all();
        $hood_units = HoodUnit::all();
        $workers = Worker::all();
        return view('livewire.workers',['hood' => $hood_units,'office'=>$office,'hood_units'=>$hood_units,'workers'=>$workers]);
    }
    public function save()
    {
        //on form submit validation
        $this->validate([
            'fullname' => 'required|unique:users,fullname',
            'phone' => 'required|numeric|min:9',
            'password'=>'required|min:8',
            'username'=>'required|unique:workers,username',
            // 'hood_id'=>'required',
            'hood_unit'=>'required',
            'office_id'=>'required',

        ]);

        //Add User Data
        $worker = new Worker();
        $worker->fullname = $this->fullname;
        $worker->username = $this->username;
        $worker->phone=$this->phone;
        $worker->directorate_id = auth()->guard('admin')->user()->directorate_id;
        $worker->password = Hash::make($this->password);
        // $worker->hood_id= $this->hood_id;
        $worker->hood_units=json_encode($this->hood_unit);
        $worker->office_id= $this->office_id;
        $worker->save();

        session()->flash('message', 'تمت عملية اضافة المفتش الجديد');

        $this->fullname = '';
        $this->password = '';
        $this->phone='';
        $this->username='';
        // $this->hood_id='';
        $this->hood_unit='';
        $this->office_id='';
        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->fullname = '';
        $this->password = '';
        $this->phone='';
        $this->username='';
        $this->hood_id='';
        $this->hood_unit='';
        $this->office_id='';
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
        $this->hood_id = $worker->hood_id ;
        $this->hood_unit = json_decode($worker->hood_units);

        $this->office_id = $worker->office_id;

    }


    public function editWorkerData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);

        $worker = Worker::where('id', $this->edit_id)->first();
        $worker->fullname = $this->fullname;
        $worker->phone = $this->phone;
        $worker->password=$this->password;
        $worker->hood_id = $this->hood_id;
        $worker->hood_units = json_encode($this->hood_unit);
        $worker->username = $this->username;
        $worker->office_id = $this->office_id;
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
