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

    public $hood_unit_no;
    public $org_types, $building_types, $streets, $street, $hood_unit;
    public function store()
    {


        $rules = [
            'org_name' => 'required',
            'org_type_id' => 'required',
            'start_date' => 'required|date',
            'owner_name' => 'required',
            'owner_phone' => 'required|numeric',
            'card_type' => 'required',
            'card_number' => 'required|numeric',
            'street_id' => 'required',
            'building_type_id' => 'required',
            'owner_img'=>'image|required',
            'personal_card'=>'file|mimes:pdf|required',
            'rent_contract'=>'file|mimes:pdf',
            'ad_board'=>'file|mimes:pdf',
            'previous_license'=>'file|mimes:pdf',
            'comm_record'=>'file|mimes:pdf',
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
        // if (!$this->file5) {
        //     unset($rules['file5']);
        // }



        $this->validate($rules);
                //تحميل ملف الصورة
        $owner_img_withex = $this->owner_img->getClientOriginalName();
        $owner_img_name = pathinfo($owner_img_withex, PATHINFO_FILENAME);
        $owner_img__ex = $this->owner_img->getClientOriginalExtension();
        $owner_img_tostore =   $owner_img_name . '.' . $owner_img__ex;


        //رفع ملف الصورة
        $pathimg = 'public/uploads/orgs/' . $this->org_name . '/' . 'owner_img/' . $owner_img_tostore;
        $this->owner_img->storeAs($pathimg);
        $rules['owner_img'] = 'storage/uploads/orgs/' . $this->org_name . '/owner_img'.'/'.$owner_img_tostore;

        // $owner_img_destinationPath = '/uploads/orgs/' . $this->org_name . '/owner_img';
        $personal_card_destinationPath = '/uploads/orgs/' . $this->org_name . '/personal_card';
        $rent_contract_destinationPath = '/uploads/orgs/' . $this->org_name . '/rent_contract';
        $ad_board_destinationPath = '/uploads/orgs/' . $this->org_name . '/ad_board';
        $previous_license_destinationPath = '/uploads/orgs/' . $this->org_name . '/previous_license';
        $comm_record_destinationPath = '/uploads/orgs/' . $this->org_name . '/comm_record';

        // رفع الملفات إلى السيرفر إذا كانت موجودة

        $personal_card_path=$this->personal_card->store('public'.$personal_card_destinationPath);
        if ($this->rent_contract) {
            $rent_contract_path=$this->rent_contract->store('public'.$rent_contract_destinationPath);
        }
        if ($this->ad_board) {
            $ad_board_path=$this->ad_board->store('public'.$ad_board_destinationPath);
        }
        if ($this->previous_license) {
            $previous_license_path=$this->previous_license->store('public'.$previous_license_destinationPath);
        }
        if ($this->comm_record) {
            $comm_record_path=$this->comm_record->store('public'.$comm_record_destinationPath);
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
                'owner_img'=>$rules['owner_img'],
                'card_type'=>$this->card_type,
                'card_number'=>$this->card_number,
                'building_type_id'=>$this->building_type_id,
                'isowner'=>$this->isowner,
                'org_type_id'=>$this->org_type_id,
                'hood_unit_id'=>$this->hood_unit_id,
                'street_id'=>$this->street_id,
                'personal_card'=>$personal_card_path,
                'rent_contract'=>$this->rent_contract ?$rent_contract_path : null,
                'ad_board'=>$this->ad_board ? $ad_board_path : null,
                'previous_license'=>$this->previous_license ?$previous_license_path : null ,
                'comm_record'=>$this->comm_record ? $comm_record_path : null,
                'start_date'=>$this->start_date,
                'fire_ext'=>$this->fire_ext,
            ]
            );
        $this->rest_inputs();


            session()->flash('message', 'تمت عملية اضافة المنشأة   ');
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
