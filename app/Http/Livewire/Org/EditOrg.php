<?php

namespace App\Http\Livewire\Org;


use App\Models\BuildingType;
use App\Models\HoodUnit;
use App\Models\Org;
use App\Models\OrgType;
use App\Models\Street;
use Livewire\Component;
use Livewire\WithFileUploads;
class EditOrg extends Component
{
use WithFileUploads;
public $org_id;
public $org_name,$owner_name,$owner_phone,$owner_img,$card_type,$card_number,
$building_type_id,$isowner,$org_type_id,$hood_unit_id,$street_id
,$personal_card,$rent_contract,$ad_board,$previous_license,$comm_record,
$addrees,$start_date,$fire_ext,$outher,$log_x,$log_y,$license_status;
    public function render()
    {
        return view('livewire..org.edit-org');
    }
    public function mount($id){
        $this->org_id=$id;
    }
    public function set_inputs(){
        $org=Org::find($this->org_id);
        $this->org_name=$org->org_name;
        $this->owner_name=$org->owner_name;
        $this->owner_phone=$org->owner_phone;
        $this->owner_img=$org->owner_img;
        $this->card_number=$org->card_number;
        $this->card_type=$org->card_type;
        $this->building_type_id = $org->building_type_id;
        $this->isowner=$org->isowner;
        $this->org_type_id=$org->org_type_id;
        $this->hood_unit_id=$org->hood_unit_id;
        $this->personal_card=$org->personal_card;
        $this->rent_contract=$org->rent_contract;
        $this->ad_board=$org->ad_board;
        $this->previous_license=$org->previous_license;
        $this->comm_record=$org->comm_record;
        $this->addrees=$org->address;   
    }
}
