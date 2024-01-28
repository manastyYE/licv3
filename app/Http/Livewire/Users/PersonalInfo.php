<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Admin;

class PersonalInfo extends Component
{

    public function render()
    {
        $admin = Admin::find(auth()->guard('admin')->user()->id);

        return view('livewire..users.personal-info',['admin'=>$admin]);
    }

}
