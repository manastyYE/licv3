<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;
use App\Models\ClipBoard;
use Alkoumi\LaravelArabicNumbers\Numbers;
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
    public $ar_str;

    public $local_fee,$total_ad,$clean,$clean_pay;

    public function render()
    {
        $clip =ClipBoard::find($this->clip_id);

        return view('livewire.auto-clip',['clip'=>$clip]);
    }
    public function mount($id){
        $this->clip_id = $id;
        $clip = ClipBoard::find($id);
        $ar = $clip->total_ad + $clip->local_fee + $clip->el_gate + $clip->clean_pay +$clip->clean;
        $this->ar_str=Numbers::TafqeetMoney($ar,'YER');
        $this->local_fee = $clip->local_fee;
        $this->clean = $clip->clean;
        $this->total_ad = $clip->total_ad;
        $this->clean_pay = $clip->clean_pay;
    }
    public function update_clip(){
        $this->validate([
            'ad_reseve'=>'required|min:1|numeric',
            'local_reseve'=>'required|numeric|min:1',


        ],
    [
        'ad_reseve.min'=>'قيمة السند خاطئة يجب ان تكون ارقاما صحيحة',
        'ad_reseve.numeric'=>'يجب ان لا يحتوي حقل رقم السند على أحرف أو رموز ',
        'ad_reseve.required'=>'لا يمكن ترك رقم سند رسوم الدعاية والاعلان فارغاً',
        'local_reseve.required'=>'لا يمكن ترك رقم سند الرسوم المحلية فارغاً',
        'local_reseve.numeric'=>'يجب ان تحتوي قيمة رقم السند على احرف او رموز',
        'local_reseve.min'=>'قيمة السند خاطئة يجب ان تكون ارقاماً صحيحة ',
    ]);

        $ed_chip=ClipBoard::find($this->clip_id);
        $ed_chip->ad_reseve = $this->ad_reseve;
        $ed_chip->clean_reseve =$this->ad_reseve;
        $ed_chip->local_reseve=$this->local_reseve;

        $ed_chip->edit_admin_id=auth()->guard('admin')->id();
        $ed_chip->clip_status="مدفوعة";
        $ed_chip->clean_reseve_date = $this->ad_reseve_date;
        $ed_chip->ad_reseve_date=$this->ad_reseve_date;
        $ed_chip->local_reseve_date =$this->local_reseve_date;
        $ed_chip->clean_reseve_note = $this->clean_reseve_note;
        $ed_chip->ad_reseve_note=$this->ad_reseve_note;
        $ed_chip->local_reseve_note =$this->local_reseve_note;
        $ed_chip->el_gate_reseve_note = $this->el_gate_reseve_note;
        $ed_chip->save();
        session()->flash('message', 'تم حفظ بيانات الحافظة بنجاح');
        $org=Org::find($ed_chip->org_id);
        $org->license_status= 'مرخص';
        $org->save();
        return redirect()->to('/admin/report/clip/'.$ed_chip->id)->with('success', ' تم اضافة ارقام السندات الى الحافظة بنجاح');

    }
    public $year_count;
    public function setYear(){
        $clip= ClipBoard::find($this->clip_id);
        $clip->year_count = $this->year_count;
        $clip->total_ad = $clip->total_ad * $this->year_count;
        $clip->clean_pay =$clip->clean_pay * $this->year_count;
        $clip->save();
        return redirect()->to('/admin/org/clip/'.$this->clip_id)->with('success', ' تم تحديد عدد السنوات للحافظة  بنجاح');
    }

    public function updateClip(){
        $this->validate([
            'local_fee'=>'required|numeric|min:0',
            'total_ad'=>'required|min:3000|numeric',
            'clean'=>'required|min:0|numeric',
            'clean_pay'=>'required|numeric|min:0',
        ]);

        $clip = ClipBoard::find($this->clip_id);
        $clip->local_fee = $this->local_fee;
        $clip->total_ad = $this->total_ad;
        $clip->clean = $this->clean;
        $clip->clean_pay = $this->clean_pay;

        $clip->save();
        return redirect()->to('/admin/org/clip/'.$this->clip_id)->with('success', ' تم اضافة  تم تعديل بيانات الحافظة بنجاح');
    }
    public function close()
    {
        $this->dispatchBrowserEvent('close-modal');
    }
}
