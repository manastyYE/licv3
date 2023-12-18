<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClipBoard extends Model
{
    use HasFactory;
    protected $fillable=[
        'org_id',
        'total_ad',
        'clean_pay',
        'local_fee',
        'el_gate',
        'ad_reseve',
        'clean_reseve',
        'local_reseve',
        'el_gate_reseve',
        'ad_reseve_date',
        'clean_reseve_date',
        'local_reseve_date',
        'el_gate_reseve_date',
        'ad_reseve_note',
        'clean_reseve_note',
        'local_reseve_note',
        'el_gate_reseve_note',
        'directorate_id',
        'admin_id',
        'edit_admin_id',
        'deleted_at',
        'clip_status',
        'infront_count',
        'sideof_count',
        'roof_count',
        'wall_count',
        'glass_stickers',
        'door_stickers',

    ];

    public function org(){
        return $this->belongsTo(Org::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function directorate(){
        return $this->belongsTo(Directorate::class);
    }
}
