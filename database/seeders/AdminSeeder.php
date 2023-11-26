<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BuildingType;
use App\Models\Directorate;
use App\Models\Hood;
use App\Models\HoodUnit;
use App\Models\Office;
use App\Models\OrgType;
use App\Models\Street;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Directorate::create([
            'name' => 'الوحدة'
        ]);

        BuildingType::create([
            'name' => 'مسلح'
        ]);

        Office::create([
            'name' => 'الصحة'
        ]);

        Hood::create([
            'name' => 'السياسي',
            'directorate_id' => '1',
        ]);

        HoodUnit::create([
            'no' => '312',
            'hood_id' => '1',
            'directorate_id' => '1',
        ]);

        OrgType::create([
            'name' => 'صيدلية',
            'price' => '10000',
            'office_id' => '1',
        ]);

        Street::create([
            'name' => 'الزبيري',
            'hood_unit_id' => '1',
            'directorate_id' => '1',
        ]);

        Admin::create([
            'fullname' => 'admin',
            'username' => 'admin',
            'phone' => '775452484',
            'password' => Hash::make('admin'),
            'directorate_id' => '1',
        ]);

        User::create([
            'fullname' => 'user',
            'username' => 'user',
            'phone' => '775452484',
            'password' => Hash::make('user'),
            'directorate_id' => '1',
            'roll' => '1',
        ]);
    }
}
