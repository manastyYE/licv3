<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    use HasFactory;
    protected $fillable=[
        'org_name',
        'owner_name',
        'owner_phone',
        'owner_img',
        'card_type',
        'card_number',
        'building_type_id',
        'isowner',
        'org_type_id',
        'hood_unit_id',
        'street_id',
        'personal_card',
        'rent_contract',
        'ad_board',
        'previous_license',
        'comm_record',
        'parcode',
        'addrees',
        'aire_drow',
        'start_date',
        'fire_ext',
        'outher',//مواافقة الجهة المختصة
        'log_x',
        'log_y',
        'license_status',
        'note',
        'admin_id',
        'come_name',// اسم الشخص الذي يقوم بالمعاملة
        'come_phone',// رقم هاتف الشخص الذي يقوم بالمعاملة
        'is_stoped',

    ];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

	public function org_type(){
        return $this->belongsTo(OrgType::class);
    }
    public function street(){
        return $this->belongsTo(Street::class);
    }
	public function building_type(){
        return $this->belongsTo(BuildingType::class);
    }
    public function hood_unit(){
        return $this->belongsTo(HoodUnit::class);
    }
}
