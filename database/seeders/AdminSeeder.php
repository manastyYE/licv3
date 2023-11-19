<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Directorate;
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
        Admin::create([
            'fullname' => 'admin',
            'username' => 'admin',
            'phone' => '775452484',
            'password' => Hash::make('admin'),
            'directorate_id' => '1',
        ]);
    }
}