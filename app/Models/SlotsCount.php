<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotsCount extends Model
{
    use HasFactory;
    protected $fillable=['slots_name','building_type_id'];
}
