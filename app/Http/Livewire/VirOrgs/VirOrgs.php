<?php

namespace App\Http\Livewire\VirOrgs;

use App\Models\VirOrgs as ModelsVirOrgs;
use Livewire\Component;

class VirOrgs extends Component
{
    public function render()
    {
        $orgs=ModelsVirOrgs::all();
        return view('livewire.vir-orgs.vir-orgs',['orgs'=>$orgs ]);
    }
}
