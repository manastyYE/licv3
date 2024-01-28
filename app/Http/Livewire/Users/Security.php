<?php

namespace App\Http\Livewire\Users;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class Security extends Component
{
    public $old_password;
    public $new,$new_conf;

    public $mes;
    public function render()
    {
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        return view('livewire..users.security',['admin'=>$admin]);
    }
    public function updatePassword(){
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        $old_pass = $admin->password;
        $this->validate([
            'old_password'=>'required'
        ],[
            'old_password.required'=>'لا يمكن ترك حقل كلمة المرور القديمة فارغاً'
        ]);

        if(Hash::check($this->old_password, $old_pass)){
            $this->validate([
                'new'=>'required',
                'new_conf' => 'required'
            ]);
            if($this->new == $this->new_conf){
                $admin->update([
                    'password' => Hash::make($this->new),
                ]);
            }
            else{
                throw ValidationException::withMessages([
                    'new' => ' كلمة المرور غير مطابقة ',
                    'new_conf'=>' كلمة المرور غير مطابقة  '
                ]);
            }
        }
        else{
            throw ValidationException::withMessages([
                'old_password' => ' كلمة المرور غير صحيحة',
            ]);
        }


    }
}
