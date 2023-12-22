<?php

namespace App\Http\Livewire\Org;

use App\Models\BuildingType;
use App\Models\HoodUnit;
use App\Models\Org;
use App\Models\OrgType;
use App\Models\Street;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddOrg extends Component
{
    use WithFileUploads;
    public $org_name, $org_type_id, $start_date, $owner_name, $owner_phone, $card_type, $card_number, $owner_img, $building_type_id, $isowner, $street_id, $hood_unit_id, $fire_ext, $personal_card, $rent_contract, $ad_board, $previous_license, $comm_record;
    public $outher;
    public $hood_unit_no;
    public $org_types, $building_types, $streets, $street, $hood_unit;
    public function store(){


        $rules = [
            'org_name' => 'required',
            'org_type_id' => 'required',
            'start_date' => 'required|date',
            'owner_name' => 'required',
            'owner_phone' => 'required|numeric',
            'card_type' => 'required',
            'card_number' => 'numeric',
            'street_id' => 'required',
            'building_type_id' => 'required',
            'personal_card'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'rent_contract'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'ad_board'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'previous_license'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'comm_record'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'outher'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'isowner'=>'required'
        ];
        if (!$this->rent_contract) {
            unset($rules['rent_contract']);
        }
        if (!$this->ad_board) {
            unset($rules['ad_board']);
        }
        if (!$this->previous_license) {
            unset($rules['previous_license']);
        }
        if (!$this->comm_record) {
            unset($rules['comm_record']);
        }
        if (!$this->outher){
            unset($rules['outher']);
        }
        if(!$this->personal_card){
            unset($rules['personal_card']);
        }
        // if (!$this->file5) {
        //     unset($rules['file5']);
        // }



        $this->validate($rules);


        if ($this->owner_img){
            $owner_img_withex = $this->owner_img->getClientOriginalName();
            $owner_img_name = pathinfo($owner_img_withex, PATHINFO_FILENAME);
            $owner_img__ex = $this->owner_img->getClientOriginalExtension();
            $owner_img_tostore =   $owner_img_name . '.' . $owner_img__ex;


            //رفع ملف الصورة

            $pathimg = 'public/uploads/orgs/' . $this->org_name  . 'owner_img ' . $owner_img_tostore;
            $this->owner_img->storeAs($pathimg);
            $rules['owner_img'] = 'storage/uploads/orgs/' . $this->org_name  . 'owner_img ' . $owner_img_tostore;

        }
                //تحميل ملف الصورة



         //تحميل ملف البطاقة
        if ($this->personal_card){
            $personal_card_withex = $this->personal_card->getClientOriginalName();
            $personal_card_name = pathinfo($personal_card_withex, PATHINFO_FILENAME);
            $personal_card__ex = $this->personal_card->getClientOriginalExtension();
            $personal_card_tostore =   $personal_card_name . '.' . $personal_card__ex;


            //رفع ملف البطاقة
            $path_personal_card = 'public/uploads/orgs/' . $this->org_name .   'personal_card' . $personal_card_tostore;
            $this->personal_card->storeAs($path_personal_card);
            $rules['personal_card'] = 'storage/uploads/orgs/' . $this->org_name .   'personal_card' . $personal_card_tostore;

        }


                 // رفع الملفات إلى السيرفر إذا كانت موجودة

        // $personal_card_path=$this->personal_card->store('public'.$personal_card_destinationPath);
        if ($this->rent_contract) {
             //تحميل ملف البطاقة
            $rent_contract_withex = $this->rent_contract->getClientOriginalName();
            $rent_contract_name = pathinfo($rent_contract_withex, PATHINFO_FILENAME);
            $rent_contract__ex = $this->rent_contract->getClientOriginalExtension();
            $rent_contract_tostore =   $rent_contract_name . '.' . $rent_contract__ex;


            //رفع ملف البطاقة
            $path_rent_contract = 'public/uploads/orgs/' . $this->org_name  . 'rent_contract' . $rent_contract_tostore;
            $this->rent_contract->storeAs($path_rent_contract);
            $rules['rent_contract'] = 'storage/uploads/orgs/' . $this->org_name  . 'rent_contract' . $rent_contract_tostore;




        }
        if ($this->ad_board) {
            $ad_board_withex = $this->ad_board->getClientOriginalName();
            $ad_board_name = pathinfo($ad_board_withex, PATHINFO_FILENAME);
            $ad_board__ex = $this->ad_board->getClientOriginalExtension();
            $ad_board_tostore =   $ad_board_name . '.' . $ad_board__ex;


            //رفع ملف البطاقة
            $path_ad_board = 'public/uploads/orgs/' . $this->org_name  . 'ad_board' . $ad_board_tostore;
            $this->ad_board->storeAs($path_ad_board);
            $rules['ad_board'] = 'storage/uploads/orgs/' . $this->org_name  . 'ad_board' . $ad_board_tostore;



        }
        if ($this->previous_license) {
            $previous_license_withex = $this->previous_license->getClientOriginalName();
            $previous_license_name = pathinfo($previous_license_withex, PATHINFO_FILENAME);
            $previous_license__ex = $this->previous_license->getClientOriginalExtension();
            $previous_license_tostore =   $previous_license_name . '.' . $previous_license__ex;


            //رفع ملف البطاقة
            $path_previous_license = 'public/uploads/orgs/' . $this->org_name  . 'previous_license' . $previous_license_tostore;
            $this->previous_license->storeAs($path_previous_license);
            $rules['previous_license'] = 'storage/uploads/orgs/' . $this->org_name  . 'previous_license' . $previous_license_tostore;



        }
        if ($this->comm_record) {
            $comm_record_withex = $this->comm_record->getClientOriginalName();
            $comm_record_name = pathinfo($comm_record_withex, PATHINFO_FILENAME);
            $comm_record__ex = $this->comm_record->getClientOriginalExtension();
            $comm_record_tostore =   $comm_record_name . '.' . $comm_record__ex;


            //رفع ملف البطاقة
            $path_comm_record = 'public/uploads/orgs/' . $this->org_name  . 'comm_record' . $comm_record_tostore;
            $this->comm_record->storeAs($path_comm_record);
            $rules['comm_record'] = 'storage/uploads/orgs/' . $this->org_name  . 'comm_record' . $comm_record_tostore;



        }
        if ($this->outher) {
            $outher_withex = $this->outher->getClientOriginalName();
            $outher_name = pathinfo($outher_withex, PATHINFO_FILENAME);
            $outher__ex = $this->outher->getClientOriginalExtension();
            $outher_tostore =   $outher_name . '.' . $outher__ex;


            //رفع ملف البطاقة
            $path_outher = 'public/uploads/orgs/' . $this->org_name  . 'outher' . $outher_tostore;
            $this->outher->storeAs($path_outher);
            $rules['outher'] = 'storage/uploads/orgs/' . $this->org_name  . 'outher' . $outher_tostore;



        }

        // if ($this->file5) {
        //     $path5 = $this->file5->store($destinationPath);
        // }









    //     //تحميل ملف الصورة
    //     $owner_img_withex = $validatedData['owner_img']->getClientOriginalName();
    //     $owner_img_name = pathinfo($owner_img_withex, PATHINFO_FILENAME);
    //     $owner_img__ex = $validatedData['owner_img']->getClientOriginalExtension();
    //     $owner_img_tostore =  time() . $owner_img_name . '.' . $owner_img__ex;


    //     //رفع ملف الصورة
    //     $pathimg = 'public/orgs/' . $this->org_name . '/' . 'owner_img/' . $owner_img_tostore;
    //     $this->owner_img->storeAs($pathimg);
    //     $validatedData['owner_img'] = 'storage/orgs/' . $this->org_name . '/' . 'owner_img/' . $owner_img_tostore;

    //     //تحميل ورفع ملف البطاقة الشخصية ومسارة
    //     $personal_cardwithex = $validatedData['personal_card']->getClientOriginalName();
    //     $personal_cardname = pathinfo($personal_cardwithex, PATHINFO_FILENAME);
    //     $personal_card_ex = $validatedData['personal_card']->getClientOriginalExtension();
    //     $personal_cardtostore =   '_' . time() . '_' . $personal_cardname . '.' . $personal_card_ex;


    //     //رفع ملف البطاقة
    //     $personal_cardpath = 'public/orgs/' . $this->org_name . '/' . 'البطاقة_' . $personal_cardtostore;
    //     $this->personal_card->storeAs($personal_cardpath);
    //     $validatedData['personal_card'] =  'storage/orgs/' . $this->org_name . '/' . 'البطاقة_' . $personal_cardtostore;
    //     $validatedData['ad_board']='';
    //     $validatedData['rent_contract']='';
    //     $validatedData['previous_license']='';
    //     $validatedData['comm_record']='';
    // //   if($this->rent_contract){
    //       //تحميل ورفع ملف عقد الايجار ومسارة
    //       $rent_contractwithex = $validatedData['rent_contract']->getClientOriginalName();
    //       $rent_contractname = pathinfo($rent_contractwithex, PATHINFO_FILENAME);
    //       $rent_contract_ex = $validatedData['rent_contract']->getClientOriginalExtension();
    //       $rent_contracttostore =   '_' . time() . '_' . $rent_contractname . '.' . $rent_contract_ex;


    //       //رفع ملف عقد الايجار
    //       $rent_contractpath = 'public/orgs/' . $this->org_name . '/' . 'العقد' . $rent_contracttostore;
    //       $this->rent_contract->storeAs($rent_contractpath);
    //       $validatedData['rent_contract'] =  'storage/orgs/' . $this->org_name . '/' . 'العقد' . $rent_contracttostore;
    //   }

    //     if($this->ad_board){
    //         //تحميل ورفع ملف اللوحة الاعلانية ومسارة
    //     $ad_boardwithex = $validatedData['ad_board']->getClientOriginalName();
    //     $ad_boardname = pathinfo($ad_boardwithex, PATHINFO_FILENAME);
    //     $ad_board_ex = $validatedData['ad_board']->getClientOriginalExtension();
    //     $ad_boardtostore =   '_' . time() . '_' . $ad_boardname . '.' . $ad_board_ex;


    //     //رفع ملف اللوحة الاعلانية
    //     $ad_boardpath = 'public/orgs/' . $this->org_name . '/' . 'اللوحة' . $ad_boardtostore;
    //     $this->ad_board->storeAs($ad_boardpath);
    //     $validatedData['ad_board'] =  'storage/orgs/' . $this->org_name . '/' . 'اللوحة' . $ad_boardtostore;
    //     }
    //     if($this->previous_license){
    //           //تحميل ورفع ملف الرخصة السابقة ومسارة
    //     $previous_licensewithex = $validatedData['previous_license']->getClientOriginalName();
    //     $previous_licensename = pathinfo($previous_licensewithex, PATHINFO_FILENAME);
    //     $previous_license_ex = $validatedData['previous_license']->getClientOriginalExtension();
    //     $previous_licensetostore =   '_' . time() . '_' . $previous_licensename . '.' . $previous_license_ex;


    //     //رفع ملف الرخصة السابقة
    //     $previous_licensepath = 'public/orgs/' . $this->org_name . '/' . 'الرخصة السابقة' . $previous_licensetostore;
    //     $this->previous_license->storeAs($previous_licensepath);
    //     $validatedData['previous_license'] =  'storage/orgs/' . $this->org_name . '/' . 'الرخصة السابقة' . $previous_licensetostore;
    //     }


    //     if($this->comm_record){
    //           //تحميل ورفع ملف السجل التجاري ومسارة
    //     $comm_recordwithex = $validatedData['comm_record']->getClientOriginalName();
    //     $comm_recordname = pathinfo($comm_recordwithex, PATHINFO_FILENAME);
    //     $comm_record_ex = $validatedData['comm_record']->getClientOriginalExtension();
    //     $comm_recordtostore =   '_' . time() . '_' . $comm_recordname . '.' . $comm_record_ex;


    //     //رفع ملف السجل التجاري
    //     $comm_recordpath = 'public/orgs/' . $this->org_name . '/' . 'السجل التجاري' . $comm_recordtostore;
    //     $this->comm_record->storeAs($comm_recordpath);
    //     $validatedData['comm_record'] =  'storage/orgs/' . $this->org_name . '/' . 'السجل التجاري' . $comm_recordtostore;
    //     }


    Org::create(
            [
                'org_name'=>$this->org_name,
                'owner_name'=>$this->owner_name,
                'owner_phone'=>$this->owner_phone,
                'owner_img'=>$this->owner_img ?$rules['owner_img'] :null,
                'card_type'=>$this->card_type,
                'card_number'=>$this->card_number,
                'building_type_id'=>$this->building_type_id,
                'isowner'=>$this->isowner,
                'org_type_id'=>$this->org_type_id,
                'hood_unit_id'=>$this->hood_unit_id,
                'street_id'=>$this->street_id,
                'personal_card'=> $this->personal_card ?$rules['personal_card'] :null,
                'rent_contract'=>$this->rent_contract ?$rules['rent_contract'] : null,
                'ad_board'=>$this->ad_board ? $rules['ad_board'] : null,
                'previous_license'=>$this->previous_license ? $rules['previous_license'] : null ,
                'comm_record'=>$this->comm_record ? $rules['comm_record'] : null,
                'start_date'=>$this->start_date,
                'fire_ext'=>$this->fire_ext,
                'outher'=>$this->outher ? $rules['outher'] :null,
            ]
            );
        $this->rest_inputs();


            session()->flash('message', 'تمت عملية اضافة المنشأة   ');
            return redirect()->to('/admin/org')->with('success', 'تمت اضافة المنشأة بنجاح ');

    }
    public function rest_inputs(){

                $this->org_name = '';
                $this->owner_name = '';
                $this->owner_phone = '';
                $this->owner_img = '';
                $this->card_type = '';
                $this->card_number = '';
                $this->building_type_id = '';
                $this->isowner = '';
                $this->org_type_id = '';
                $this->hood_unit_id = '';
                $this->street_id = '';
                $this->personal_card = '';
                $this->rent_contract= '';
                $this->ad_board = '';
                $this->previous_license = '';
                $this->comm_record = '';
                $this->start_date = '';
                $this->fire_ext = '';
                $this->outher='';
    }
    public function reloadPage()
    {
        $this->store();
        $this->emit('store');
    }
    public function getselect()
    {
        $this->org_types = OrgType::all();
        $this->building_types = BuildingType::all();
        $this->streets = Street::all();
    }
    public function render()
    {
        // $this->fire_ext ="لا";

        if ($this->street_id) {

            $hood_unit = Street::find($this->street_id);
            $this->hood_unit_id = $hood_unit->hood_unit_id;
            $hood_unit_no=HoodUnit::find($this->hood_unit_id);
            $this->hood_unit_no=$hood_unit_no->no;
        } else {
            $this->hood_unit_id = '';
        }
        $this->getselect();
        return view('livewire..org.add-org');
    }
}
