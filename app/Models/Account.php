<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable=[
        'father_account',
        'acc_num',
        'acc_name',
        'acc_national'
    ];
}
