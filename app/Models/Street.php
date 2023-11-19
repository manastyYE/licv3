<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;
    protected $fillable=['name','hood_unit_id'];
    public function hood_unit(){
        return $this->belongsTo(HoodUnit::class);
    }

}
