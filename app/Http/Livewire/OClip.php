<?php

namespace App\Http\Livewire;

use App\Models\OutherClip;
use Alkoumi\LaravelArabicNumbers\Numbers;
use Livewire\Component;

class OClip extends Component
{
    public $clip_id;
    public $reseve,$reseve_date,$erseve_note;
    public $ar_str;
    public function render()
    {
        $clip = OutherClip::find($this->clip_id);
        return view('livewire.o-clip',['clip'=> $clip]);
    }
    public function mount($id){
        $this->clip_id = $id;
        $clip = OutherClip::find($id);
        $ar = $clip->price + $clip->other_price;
        $this->ar_str = Numbers::TafqeetMoney($ar,'YER');
    

    }
    public function update_clip(){
        $clip = OutherClip::find($this->clip_id);
        $this->validate([
            'reseve' =>'required|numeric',
            '$reseve_date' =>'required',
        ]);
        $clip->reseve = $this->reseve;
        $clip->reseve_date = $this->reseve_date;
        $clip->erseve_note = $this->erseve_note;
        $clip->clip_status ='مدفوعة';
        $clip->save();

        return  redirect()->to('/admin/report/outherclip/'.$this->clip_id)->with('success', ' تم اضافة ارقام السندات الى الحافظة بنجاح');
    }
}
