<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirOrgs extends Model
{
    use HasFactory;

    protected $fillable=[
        'org_name',
        'owner_name',
        'owner_phone',
        'org_type_id',
        'hood_unit_id',
        'street_id',
        'note',
        'log_x',
        'log_y',
        'user_id',
        'org_image',
    ];

	public function org_type(){
        return $this->belongsTo(OrgType::class);
    }
    public function street(){
        return $this->belongsTo(Street::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
