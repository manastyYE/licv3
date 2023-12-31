<?php

namespace App\Http\Livewire\VirOrgs;

use App\Models\VirOrgs as ModelsVirOrgs;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\OrgsExport;
use App\Exports\VirOrgsExport;
use Maatwebsite\Excel\Facades\Excel;

class VirOrgs extends Component
{
    use WithPagination;
    public $search;
    public $selectedUserIds = [];
    public function render()
    {
        $orgs=$this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->orwhere('owner_name','like','%'.$this->search . '%')
        ->paginate(8) :ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->paginate(8);
        $this->selectedUserIds = $this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->orwhere('owner_name','like','%'.$this->search . '%')->pluck('id') :ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->pluck('id');
        // $this->selectedUserIds = $org_exel->pluck('id');
        return view('livewire.vir-orgs.vir-orgs',['orgs'=>$orgs ]);
    }
    public function reloadPage()
    {
        $this->store();
        $this->emit('store');
    }

    public function export()
    {
        $users = $this->selectedUserIds;
        return Excel::download(new VirOrgsExport($users), 'vir_orgs.xlsx');
        // return Excel::download(new OrgsExport, 'users.xlsx');
    }

}
