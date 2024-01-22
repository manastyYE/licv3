<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgType extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'local_fee',
        'office_id',
    ];

    public function office(){
        return $this->belongsTo(Office::class);
    }
}
