<?php

namespace App\Http\Livewire;

use App\Models\Billboard;
use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;
use App\Models\ClipBoard;
use App\Models\Street;
use App\Models\HoodUnit;
use App\Models\OrgType;
use App\Models\BuildingType;
use Livewire\WithFileUploads;

class ShowOrgDtl extends Component
{
    use WithFileUploads;
    public $org_types,$building_types,$streets;

    public $hood_unit_no;
    public $org_id;
    public $el_gate,$local_fee;
    public $billboard_id, $height, $wideth, $count, $edit_billboard_id,$del_billboard_id;
    public $ed_billboard_id, $ed_height, $ed_wideth, $ed_count;
    public function render()
    {   $org_billBoard=OrgBillboard::where('org_id',$this->org_id)->get();
        $org=Org::find($this->org_id);
        $bill_board = Billboard::all();
        $clip =ClipBoard::where('org_id',$this->org_id)->orderBy('created_at','desc')->get();
        if ($this->street_id) {

            $hood_unit = Street::find($this->street_id);
            $this->hood_unit_id = $hood_unit->hood_unit_id;
            $hood_unit_no=HoodUnit::find($this->hood_unit_id);
            $this->hood_unit_no=$hood_unit_no->no;
        } else {
            $this->hood_unit_id = '';
        }
        $this->getselect();
        return view('livewire.show-org-dtl',['org'=>$org,'type'=>$org_billBoard,'bill'=>$bill_board,'clip'=>$clip]);
    }
    public function dowmloadpdf($pdf){

        return response()->download($pdf);
    }
    public function mount($id){
        $this->org_id=$id;
    }
    public function storeOrgBillBoardData()
    {
        //on form submit validation
        $this->validate([

            'billboard_id' => 'required',
            'height' => 'required',
            'wideth'=>'required|numeric',
            'count'=>'required|numeric',

        ]);

        //Add Student Data
        $orgbillboard = new OrgBillboard();
        $orgbillboard->org_id = $this->org_id;
        $orgbillboard->billboard_id = $this->billboard_id;
        $orgbillboard->height = $this->height;
        $orgbillboard->width = $this->wideth;
        $orgbillboard->count = $this->count;
        $orgbillboard->save();

        session()->flash('message', 'تمت عملية اضافة اللوحة الجديدة');

        $this->billboard_id = '';
        $this->height = '';
        $this->wideth = '';
        $this->count = '';

        //For hide modal after add user success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInputs()
    {
        $this->billboard_id = '';
        $this->height = '';
        $this->wideth = '';
        $this->count = '';
        $this->ed_billboard_id = '';
        $this->ed_height = '';
        $this->ed_wideth = '';
        $this->ed_count = '';
    }

    public function close()
    {
        $this->resetInputs();
    }
    public function setname($id)
    {
        $orgbillboard = OrgBillboard::find($id);

        $this->edit_billboard_id = $orgbillboard->id;

        $this->ed_billboard_id = $orgbillboard->id;
        $this->ed_height = $orgbillboard->height;
        $this->ed_wideth = $orgbillboard->wideth;
        $this->ed_count = $orgbillboard->count;
    }


    public function editOrgBillboardData()
    {
        //on form submit validation
        // $this->validate([
        //     'no' => 'required|numeric|unique:hood_units,no,'.$this->student_id.'', //Validation with ignoring own data
        //     'name' => 'required',

        // ]);
        // 'org_id',
        // 'billboard_id',
        // 'height',
        // 'wideth',
        // 'count',

        $bill_board_ed = OrgBillboard::where('id', $this->edit_billboard_id)->first();
        $bill_board_ed->billboard_id = $this->ed_billboard_id;
        $bill_board_ed->height = $this->ed_height;
        $bill_board_ed->wideth = $this->ed_wideth;
        $bill_board_ed->count = $this->ed_count;
        $bill_board_ed->save();

        session()->flash('message', 'تم تعديل بيانات اللوحة بنجاح');

        $this->resetInputs();

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    //Delete Confirmation
    public function deleteConfirmation($id)
    {
        $this->del_billboard_id = $id; //student id


    }

    public function deleteOrgBillboardData()
    {
        $orgBillboard = OrgBillboard::where('id', $this->del_billboard_id)->first();
        $orgBillboard->delete();

        session()->flash('message', 'تم حذف اللوحة  بنجاح');

        $this->dispatchBrowserEvent('close-modal');

        $this->del_billboard_id = '';
    }

    public function cancel()
    {
        $this->del_billboard_id = '';
        $this->dispatchBrowserEvent('close-modal');
    }
    public function git_total_ad_fee(){
        $board = OrgBillboard::where('org_id', $this->org_id)->get();
        $total = 0;
        foreach ($board as $key) {
            $total += ($key->height * $key->width * $key->count *$key->billboard->price);
        }
        return $total;
    }
    public function get_clean_fee(){
        $clean_fee=Org::find($this->org_id);
        $fee=$clean_fee->org_type->price;
        return $fee;
    }
    public function storeClipData(){

        $board1 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',1)->get();
        $count1 = 0.0;
        foreach ($board1 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count1 += $hi*$wi* $ke->count;
        }
        $board2 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',2)->get();
        $count2 = 0.0;
        foreach ($board2 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count2 += $hi*$wi* $ke->count;
        }
        $board3 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',3)->get();
        $count3 = 0.0;
        foreach ($board3 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count3 += $hi*$wi* $ke->count;
        }
        $board4 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',4)->get();
        $count4 = 0.0;
        foreach ($board4 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count4 += $hi*$wi* $ke->count;
        }
        $board5 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',5)->get();
        $count5 = 0.0;
        foreach ($board5 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count5 += $hi*$wi* $ke->count;
        }
        $board6 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',6)->get();
        $count6 = 0.0;
        foreach ($board6 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count6 += $hi*$wi* $ke->count;
        }
        $this->validate(
            [
                'local_fee'=> 'required|numeric|min:0',
                'el_gate'=>'required|numeric|min:0',
            ]
        );

        $new_clip = new ClipBoard();
        $new_clip->org_id = $this->org_id;
        $new_clip->total_ad = $this->git_total_ad_fee();
        $new_clip->clean_pay = $this->get_clean_fee();
        $new_clip->local_fee = $this->local_fee;
        $new_clip->el_gate = $this->el_gate;
        $new_clip->admin_id =auth()->guard('admin')->id();
        $new_clip->edit_admin_id=auth()->guard('admin')->id();
        $new_clip->directorate_id =auth()->guard('admin')->user()->directorate_id;
        $new_clip->infront_count = $count2;
        $new_clip->sideof_count = $count1;
        $new_clip->roof_count = $count5;
        $new_clip->wall_count = $count3;
        $new_clip->glass_stickers =$count4;
        $new_clip->door_stickers =$count6;
        $new_clip->save();

        session()->flash('message', 'تم انشاء الحافظة  بنجاح');

        $this->dispatchBrowserEvent('close-modal');


    }
    public function getselect()
    {
        $this->org_types = OrgType::all();
        $this->building_types = BuildingType::all();
        $this->streets = Street::all();
    }
    public $org_name,$owner_name,$owner_phone,$owner_img,$card_type,$card_number,$building_type_id,$isowner
    ,$org_type_id,$street_id,$fire_ext,$hood_unit_id;
    public function set_org_info(){
        $org=Org::find($this->org_id);
        $this->org_name=$org->org_name;
        $this->owner_name = $org->owner_name;
        $this->owner_phone =$org->owner_phone;
        // $this->owner_img = $org->owner_img;
        $this->card_type =$org->card_type;
        $this->card_number =$org->card_number;
        $this->building_type_id  = $org->building_type_id;
        $this->isowner =$org->isowner;
        $this->org_type_id =$org->org_type_id;
        $this->street_id =$org->street_id;
        $this->hood_unit_id = $org->street->hood_unit_id;
        $this->fire_ext =$org->fire_ext;

    }
    public function update_org_info(){



        $this->validate([
            'org_name'=>'required',
            'owner_phone'=>'numeric',
            'org_type_id'=>'required',
            'street_id'=>'required',
            'fire_ext'=>'required',

        ]);
        if ($this->owner_img){
            // تحميل ملف الصورة
            $owner_img_withex = $this->owner_img->getClientOriginalName();
            $owner_img_name = pathinfo($owner_img_withex, PATHINFO_FILENAME);
            $owner_img__ex = $this->owner_img->getClientOriginalExtension();
            $owner_img_tostore =   $owner_img_name . '.' . $owner_img__ex;


            //رفع ملف الصورة

            $pathimg = 'public/uploads/orgs/' . $this->org_name  . 'owner_img ' . $owner_img_tostore;
            $this->owner_img->storeAs($pathimg);
            $rules['owner_img'] = 'storage/uploads/orgs/' . $this->org_name  . 'owner_img ' . $owner_img_tostore;

        }
        $org = Org::find($this->org_id);
        $org->org_name =$this->org_name;
        $org->owner_name = $this->owner_name;
        $org->owner_phone =$this->owner_phone;
        $org->owner_img = $this->owner_img ?  $rules['owner_img']: $org->owner_img;
        $org->card_type =$this->card_type;
        $org->card_number = $this->card_number;
        $org->building_type_id =$this->building_type_id;
        $org->isowner = $this->isowner;
        $org->org_type_id =$this->org_type_id;
        $org->street_id=$this->street_id;
        $org->hood_unit_id =$this->hood_unit_id;
        $org->fire_ext = $this->fire_ext;
        $org->save();

        return redirect()->to('/admin/org/show/'.$this->org_id)->with('success', ' تم تعديل بينات المنشأة بنجاح' );





    }


}
