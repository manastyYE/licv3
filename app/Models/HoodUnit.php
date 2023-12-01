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
        'directorate_id',
    ];
    public function hood(){
        return $this->belongsTo(Hood::class);
    }
    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }
    public function street()
    {
        return $this->hasMany(Street::class);
    }
}
