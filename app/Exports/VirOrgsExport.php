<?php

namespace App\Exports;

use App\Models\VirOrgs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class VirOrgsExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return VirOrgs::all();
    // }
    protected $users;
    protected $ismoved = "لم تنقل";

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function query()
    {
        return VirOrgs::with(['street','org_type','user'])->whereIn('id', $this->users);
    }

    public function headings(): array
    {
        return [
            'رقم المنشأة',
            'اسم المنشأة',
            'اسم المالك',
            'رقم المالك',
            'الشارع',
            'نوع النشاط',
            'دوائر العرض',
            'خطوط الطول',
            'المستخدم',
            'الحالة',
        ];
    }

    public function map($user): array
    {
        if ($user->is_moved == 1) {
            $this->ismoved = "تم النقل";
        }
        else{
            $this->ismoved = "لم تنقل";
        }
        return [
            $user->id,
            $user->org_name,
            $user->owner_name,
            $user->owner_phone,
            $user->street->name,
            $user->org_type->name,
            $user->log_x,
            $user->log_y,
            $user->user->fullname,
            $this->ismoved,
        ];
    }
    public function startCell(): string
    {
        return 'A1'; // Set the start cell to A1
    }
}
