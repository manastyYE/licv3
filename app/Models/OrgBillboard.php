<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgBillboard extends Model
{
    use HasFactory;
    protected $fillable=[
        'org_id',
        'billboard_id',
        'height',
        'wideth',
        'count',
    ];
}
