<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hood extends Model
{
    use HasFactory;
    protected $fillable=[

        'name',
        'directorate_id',

    ];
    public function directorate(){
        return $this->belongsTo(Directorate::class);
    }
}
