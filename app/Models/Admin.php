<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'fullname',
        'phone',
        'username',
        'password',
        'admin_img',
        'directorate_id',
        'session_id',
    ];
    public function directorate(){
        return $this->belongsTo(Directorate::class);
    }
}
