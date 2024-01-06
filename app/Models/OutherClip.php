<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutherClip extends Model
{
    use HasFactory;
    protected $fillable = [
        'org_id',
        'office_id',
        'price',
        'reseve',
        'reseve_date',
        'erseve_note',
        'other_price',
        'clip_status',
        'admin_id',
    ];
    public function org(){
        return $this->belongsTo(Org::class);
    }
    public function office(){
        return $this->belongsTo(Office::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
