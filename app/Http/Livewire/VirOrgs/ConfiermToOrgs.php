<?php

namespace App\Http\Livewire\VirOrgs;

use Livewire\Component;

class ConfiermToOrgs extends Component
{
    public $vier_org_id;
    public $org_name,$owner_name,$owner_phone,$owner_img
    ,$card_type,$card_number,$building_type_id,$iowner,
    $org_type_id,$hood_unit_id,$street_id,$personal_card,
    $rent_contract,$ad_board,$previous_license,$comm_record,
    $parcode,$address,$log_x,$log_y,$fire_ext,$start_date,
    $outher;

    public function render()
    {
        return view('livewire..vir-orgs.confierm-to-orgs');
    }
    public function mount($id){
        $this->vier_org_id = $id;
    }
}
