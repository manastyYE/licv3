<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opration extends Model
{
    use HasFactory;
    protected $fillable=[
        'opt_num',
        'clip_num',
        'depit',
        'creidt',
        'acc_num',
        'acc_name',
        'opt_type',
        'acc_year',
        'info'
    ];
}
