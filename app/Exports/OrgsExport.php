<?php

namespace App\Exports;

use App\Models\Org;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class OrgsExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Org::all();
    // }

    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function query()
    {
        return Org::with(['street','org_type'])->whereIn('id', $this->users);
    }

    public function headings(): array
    {
        return [
            'رقم المنشأة',
            'اسم المنشأة',
            'اسم المالك',
            'رقم المالك',
            'نوع البطاقة',
            'رقم البطاقة',
            'الشارع',
            'نوع النشاط',
            'تاريخ البدء',
            'حالة الترخيص',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->org_name,
            $user->owner_name,
            $user->owner_phone,
            $user->card_type,
            $user->card_number,
            $user->street->name,
            $user->org_type->name,
            $user->start_date,
            $user->license_status,
        ];
    }
    public function startCell(): string
    {
        return 'A1'; // Set the start cell to A1
    }
}
