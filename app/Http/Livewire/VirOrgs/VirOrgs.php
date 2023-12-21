<?php

namespace App\Http\Livewire\VirOrgs;

use App\Models\VirOrgs as ModelsVirOrgs;
use Livewire\Component;
use Livewire\WithPagination;

class VirOrgs extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $orgs=$this->search ?ModelsVirOrgs::orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->orwhere('owner_name','like','%'.$this->search . '%')
        ->paginate(8) :ModelsVirOrgs::orderBy('created_at', 'desc')
        ->paginate(8);

        return view('livewire.vir-orgs.vir-orgs',['orgs'=>$orgs ]);
    }
    public function reloadPage()
    {
        $this->store();
        $this->emit('store');
    }
}
