<?php

namespace App\Http\Livewire\VirOrgs;

use Livewire\Component;

class ConfiermToOrgs extends Component
{
    public $vier_org_id;

    public function render()
    {
        return view('livewire..vir-orgs.confierm-to-orgs');
    }
    public function mount($id){
        $this->vier_org_id = $id;
    }
}
