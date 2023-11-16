<?php

namespace App\Http\Livewire\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class Login extends Component
{
    public $username,$password;
    public function render()
    {
        return view('livewire..login.login');
    }
    public function adminlogin(){
        $validatedData = $this->validate([
            'username' => 'required|min:4',
            'password' => 'required|string|min:5',
        ], [
            'username.required' => 'يجب تعبئة حقل اسم المستخدم.',
            'username.min' => 'يجب ان يكون اسم المستخدم من 4 احرف على الاقل',
            'password.required' => 'يجب تعبئة حقل كلمة المرور.',
            'password.min' => 'يجب أن تحتوي كلمة المرور على 5 أحرف على الأقل.',
        ]);
        if (Auth::guard('admin')->attempt(['username' => $validatedData['username'],'password' =>$this->password])) {

            $user_id = Auth::id();
            session()->put('id', $user_id);
            return redirect()->route('dashboard');
        } else {
            throw ValidationException::withMessages([
                'username' => 'اسم المستخدم او كلمة المرور غير صحيحة',
            ]);
        }
    }
    public function reloadPage()
    {
        $this->adminlogin();
        $this->emit('reloadPage');
    }
}
