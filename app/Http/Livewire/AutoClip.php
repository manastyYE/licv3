<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;
use App\Models\ClipBoard;
class AutoClip extends Component
{
    public $clip_id;
    public $total;
    public $ad_reseve;//رقم سند الدعاية والاعلان
    public $clean_reseve;//رقم ستد رسوم نظافة المهن
    public $local_reseve;//رقم سند الرسوم المحلية
    public $el_gate_reseve;//رقم سند رسوم البوابة الالكترونية
    public $ad_reseve_date;//تاريخ سند الدعاية والاعلان
    public $clean_reseve_date;//تاريخ ستد رسوم نظافة المهن
    public $local_reseve_date;//تاريخ سند الرسوم المحلية
    public $el_gate_reseve_date;//تاريخ سند رسوم البوابة الالكترونية
    public $ad_reseve_note;//ملاحظة سند الدعاية والاعلان
    public $clean_reseve_note;//ملاحظة ستد رسوم نظافة المهن
    public $local_reseve_note;//ملاحظة سند الرسوم المحلية
    public $el_gate_reseve_note;//ملاحظة سند رسوم البوابة الالكترونية


    public function render()
    {
        $clip =ClipBoard::find($this->clip_id);

        return view('livewire.auto-clip',['clip'=>$clip]);
    }
    public function mount($id){
        $this->clip_id = $id;
    }
    public function update_clip(){
        $this->validate([
            'ad_reseve'=>'min:1|numeric',
            'clean_reseve'=>'required|numeric|min:0',
            'local_reseve'=>'required|numeric|min:1',
            'el_gate_reseve'=>'required|numeric|min:1',

        ]);

        $ed_chip=ClipBoard::find($this->clip_id);
        $ed_chip->ad_reseve = $this->ad_reseve;
        $ed_chip->clean_reseve =$this->clean_reseve;
        $ed_chip->local_reseve=$this->local_reseve;
        $ed_chip->el_gate_reseve =$this->el_gate_reseve;
        $ed_chip->edit_admin_id=auth()->guard('admin')->id();
        $ed_chip->clip_status="مدفوعة";
        $ed_chip->clean_reseve_date = $this->clean_reseve_date;
        $ed_chip->ad_reseve_date=$this->ad_reseve_date;
        $ed_chip->local_reseve_date =$this->local_reseve_date;
        $ed_chip->el_gate_reseve_date = $this->el_gate_reseve_date;
        $ed_chip->clean_reseve_note = $this->clean_reseve_note;
        $ed_chip->ad_reseve_note=$this->ad_reseve_note;
        $ed_chip->local_reseve_note =$this->local_reseve_note;
        $ed_chip->el_gate_reseve_note = $this->el_gate_reseve_note;
        $ed_chip->save();
        session()->flash('message', 'تم حفظ بيانات الحافظة بنجاح');
        $org=Org::find($ed_chip->org_id);
        $org->license_status= 'مرخص';
        $org->save();

    }
}
