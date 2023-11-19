<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoodUnit extends Model
{
    use HasFactory;
    protected $fillable = [

        'no',
        'hood_id',
    ];
    public function hood(){
        return $this->belongsTo(Hood::class);
    }
}
