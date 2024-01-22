<?php

namespace App\Http\Livewire\VirOrgs;

use App\Models\VirOrgs as ModelsVirOrgs;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\OrgsExport;
use App\Exports\VirOrgsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Worker;

class VirOrgs extends Component
{
    use WithPagination;
    public $search;

    public $selectedUserIds = [];
    public $worker_id;
    public function render()
    {
        $workers = Worker::all();
        if($this->worker_id !=""){
            $orgs=$this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->where('user_id',$this->worker_id)
        ->orwhere('owner_name','like','%'.$this->search . '%')->where('user_id',$this->worker_id)
        ->paginate(8) :ModelsVirOrgs::with(['street','org_type','user'])->where('user_id',$this->worker_id)
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        // $this->selectedUserIds = $this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        // ->where('org_name','like','%'.$this->search . '%')
        // ->where('user_id',$this->worker_id)
        // ->orwhere('owner_name','like','%'.$this->search . '%')->pluck('id') :ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        // ->pluck('id');
        }
        else{
            $orgs=$this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->orwhere('owner_name','like','%'.$this->search . '%')
        ->paginate(8) :ModelsVirOrgs::with(['street','org_type','user'])
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        // $this->selectedUserIds = $this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        // ->where('org_name','like','%'.$this->search . '%')
        // ->orwhere('owner_name','like','%'.$this->search . '%')->pluck('id') :ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        // ->pluck('id');
        }
        // $this->selectedUserIds = $org_exel->pluck('id');
        return view('livewire.vir-orgs.vir-orgs',['orgs'=>$orgs ,'workers'=>$workers]);
    }
    public function reloadPage()
    {
        $this->store();
        $this->emit('store');
    }

    public function export()
    {
        if($this->worker_id !=""){
        $this->selectedUserIds = $this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->where('user_id',$this->worker_id)
        ->orwhere('owner_name','like','%'.$this->search . '%')->pluck('id') :ModelsVirOrgs::with(['street','org_type','user'])->where('user_id',$this->worker_id)->orderBy('created_at', 'desc')
        ->pluck('id');
        }else{
            $this->selectedUserIds = $this->search ?ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->where('org_name','like','%'.$this->search . '%')
        ->orwhere('owner_name','like','%'.$this->search . '%')->pluck('id') :ModelsVirOrgs::with(['street','org_type','user'])->orderBy('created_at', 'desc')
        ->pluck('id');
        }
        $users = $this->selectedUserIds;
        return Excel::download(new VirOrgsExport($users), 'vir_orgs.xlsx');
        // return Excel::download(new OrgsExport, 'users.xlsx');
    }

}
