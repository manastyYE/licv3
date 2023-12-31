<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalPay extends Model
{
    use HasFactory;
    protected $fillable=[
        'org_id',
        'outher_bayment_id',
        'amount',
        'dtl',
    ];
}
