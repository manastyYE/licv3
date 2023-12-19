<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
class Worker extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable=[
        'username',
        'password',
        'fullname',
        'phone',
        'directorate_id',
        // 'hood_id',
        'hood_units',
        'office_id',
    ];
    public function directorate(){
        return $this->belongsTo(Directorate::class);
    }
    // public function hood(){
    //     return $this->belongsTo(Hood::class);
    // }
    public function office(){
        return $this->belongsTo(Office::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
