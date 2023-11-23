<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Org;
use App\Models\OrgBillboard;
class AutoClip extends Component
{
    public $org_id;
    public $total;

    public function render()
    {


        $org= Org::find($this->org_id);
        // $board = OrgBillboard::where('org_id', $this->org_id)->get();

        $this->git_total();

        $board1 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',1)->get();
        $count1 = 0;
        foreach ($board1 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count1 += $hi*$wi* $ke->count;
        }
        $board2 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',2)->get();
        $count2 = 0;
        foreach ($board2 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count2 += $hi*$wi* $ke->count;
        }
        $board3 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',3)->get();
        $count3 = 0;
        foreach ($board3 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count3 += $hi*$wi* $ke->count;
        }
        $board4 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',4)->get();
        $count4 = 0;
        foreach ($board4 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count4 += $hi*$wi* $ke->count;
        }
        $board5 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',5)->get();
        $count5 = 0;
        foreach ($board5 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count5 += $hi*$wi* $ke->count;
        }
        $board6 = OrgBillboard::where('org_id', $this->org_id)->where('billboard_id',6)->get();
        $count6 = 0;
        foreach ($board6 as $ke) {
            $hi=$ke->height;
            $wi=$ke->width;
            $count6 += $hi*$wi* $ke->count;
        }

        $boards=[
            'count1'=> $count1,
            'count2'=> $count2,
            'count3'=> $count3,
            'count4'=> $count4,
            'count5'=> $count5,
            'count6'=> $count6,


        ];
        return view('livewire.auto-clip',['org'=>$org,'board1'=>$boards]);
    }
    public function mount($id){
        $this->org_id = $id;
    }
    public function git_total(){
        $board = OrgBillboard::where('org_id', $this->org_id)->get();
        $this->total = 0;
        foreach ($board as $key) {
            $this->total += ($key->height * $key->width * $key->count *$key->billboard->price);
        }
    }
}
