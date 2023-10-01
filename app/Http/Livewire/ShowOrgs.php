<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
class ShowOrgs extends Component
{
    public function render()
    {
        $orgs=Org::all();
        return view('livewire.show-orgs',['type'=>$orgs ]);
    }
    
}
