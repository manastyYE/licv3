<?php

namespace Database\Seeders;

use App\Models\Directorate;
use App\Models\Hood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoods = array(
            array('id' => '2','name' => 'الصناعي','directorate_id' => '1','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'الامناء','directorate_id' => '1','created_at' => '2023-11-22 13:02:29','updated_at' => '2023-11-22 13:02:29'),
            array('id' => '4','name' => 'البليلي','directorate_id' => '1','created_at' => '2023-11-22 13:02:39','updated_at' => '2023-11-22 13:02:39'),
            array('id' => '5','name' => 'الحي السياسي','directorate_id' => '1','created_at' => '2023-11-22 13:02:51','updated_at' => '2023-11-22 13:02:51'),
            array('id' => '6','name' => 'الصافية الغربية','directorate_id' => '1','created_at' => '2023-11-22 13:03:04','updated_at' => '2023-11-22 13:03:04'),
            array('id' => '7','name' => 'فج عطان','directorate_id' => '1','created_at' => '2023-11-22 13:03:22','updated_at' => '2023-11-22 13:03:22'),
            array('id' => '8','name' => 'الصباحة','directorate_id' => '1','created_at' => '2023-11-22 13:03:31','updated_at' => '2023-11-22 13:03:31')
        );
        // Directorate::create([
        //     'name' => 'الوحدة'
        // ]);
        foreach($hoods as $hood){
            Hood::create([
                'id' => $hood['id'],
                'name' => $hood['name'],
                'directorate_id' => $hood['directorate_id'],
            ]);
        }
    }
}
