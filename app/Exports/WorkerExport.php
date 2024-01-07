<?php

namespace App\Exports;

use App\Models\Worker;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\FromCollection;

class WorkerExport implements FromQuery, WithHeadings, WithMapping, WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $users;
    public function __construct($users)
    {
        $this->users = $users;
    }

    public function query()
    {
        return Worker::with(['office'])->whereIn('id', $this->users);
    }

    public function headings(): array
    {
        return [
            'الاسم',
            'الهاتف',
            'المكتب',
        ];
    }

    public function map($user): array
    {
        return [
            $user->fullname,
            $user->phone,
            $user->office->name,
        ];
    }
    public function startCell(): string
    {
        return 'A1'; // Set the start cell to A1
    }
}
