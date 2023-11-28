<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
use Livewire\WithPagination;
class ShowOrgs extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $orgs=Org::all();
        $orgs = $this->search ? Org::orderBy('created_at', 'desc')->where('org_name', 'like', '%' . $this->search . '%')
            ->orWhere('owner_name', 'like', '%' . $this->search . '%')
            ->orWhere('owner_phone', 'like', '%' . $this->search . '%')


            ->paginate(8)
            : Org::orderBy('created_at', 'desc')->paginate(8);

        return view('livewire.show-orgs',['type'=>$orgs ]);
    }

}
