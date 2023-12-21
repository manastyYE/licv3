<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirOrgBillboard extends Model
{
    use HasFactory;
    protected $fillable=[
        'vir_org_id',
        'billboard_id',
        'height',
        'width',
        'count',
    ];
    public function billboard(){
        return $this->belongsTo(Billboard::class);
    }
}
