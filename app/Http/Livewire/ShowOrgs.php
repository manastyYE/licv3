<?php

namespace App\Http\Livewire;

use App\Exports\OrgsExport;
use Livewire\Component;
use App\Models\Org;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ShowOrgs extends Component
{
    use WithPagination;
    public $search;
    public $selectedUserIds = [];
    public function render()
    {

        $orgs = $this->search ? Org::with(['street','org_type'])->orderBy('created_at', 'desc')->where('org_name', 'like', '%' . $this->search . '%')
            ->orWhere('owner_name', 'like', '%' . $this->search . '%')
            ->orWhere('owner_phone', 'like', '%' . $this->search . '%')


            ->paginate(8)
            : Org::with(['street','org_type'])->orderBy('created_at', 'desc')->paginate(8);

            $this->selectedUserIds = $orgs->pluck('id');

        return view('livewire.show-orgs',['type'=>$orgs ]);
    }

    public function export()
    {
        $users = $this->selectedUserIds;
        return Excel::download(new OrgsExport($users), 'users.xlsx');
        // return Excel::download(new OrgsExport, 'users.xlsx');
    }

}
