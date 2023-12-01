<?php

namespace Database\Seeders;

use App\Models\HoodUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HoodUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hood_units = array(
            array('id' => '1','no' => '310','hood_id' => '2','directorate_id' => '1','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','no' => '311','hood_id' => '4','directorate_id' => '1','created_at' => '2023-11-22 13:29:46','updated_at' => '2023-11-22 13:29:46'),
            array('id' => '4','no' => '313','hood_id' => '4','directorate_id' => '1','created_at' => '2023-11-22 13:30:24','updated_at' => '2023-11-22 13:30:24'),
            array('id' => '5','no' => '314','hood_id' => '4','directorate_id' => '1','created_at' => '2023-11-22 13:30:41','updated_at' => '2023-11-22 13:30:41'),
            array('id' => '6','no' => '321','hood_id' => '3','directorate_id' => '1','created_at' => '2023-11-22 13:31:23','updated_at' => '2023-11-22 13:31:23'),
            array('id' => '7','no' => '322','hood_id' => '3','directorate_id' => '1','created_at' => '2023-11-22 13:31:29','updated_at' => '2023-11-22 13:31:29'),
            array('id' => '9','no' => '425','hood_id' => '5','directorate_id' => '1','created_at' => '2023-11-22 13:32:11','updated_at' => '2023-11-22 13:32:11'),
            array('id' => '10','no' => '422','hood_id' => '5','directorate_id' => '1','created_at' => '2023-11-22 13:32:17','updated_at' => '2023-11-22 13:32:17'),
            array('id' => '11','no' => '421','hood_id' => '5','directorate_id' => '1','created_at' => '2023-11-22 13:32:23','updated_at' => '2023-11-22 13:32:23'),
            array('id' => '12','no' => '424','hood_id' => '5','directorate_id' => '1','created_at' => '2023-11-22 13:32:31','updated_at' => '2023-11-22 13:32:31'),
            array('id' => '13','no' => '423','hood_id' => '5','directorate_id' => '1','created_at' => '2023-11-22 13:32:38','updated_at' => '2023-11-22 13:32:38'),
            array('id' => '14','no' => '451','hood_id' => '7','directorate_id' => '1','created_at' => '2023-11-22 13:33:06','updated_at' => '2023-11-22 13:33:06'),
            array('id' => '15','no' => '442','hood_id' => '7','directorate_id' => '1','created_at' => '2023-11-22 13:33:15','updated_at' => '2023-11-22 13:33:15'),
            array('id' => '16','no' => '441','hood_id' => '7','directorate_id' => '1','created_at' => '2023-11-22 13:33:23','updated_at' => '2023-11-22 13:33:23'),
            array('id' => '17','no' => '411','hood_id' => '2','directorate_id' => '1','created_at' => '2023-11-22 13:34:24','updated_at' => '2023-11-22 13:34:24'),
            array('id' => '18','no' => '431','hood_id' => '2','directorate_id' => '1','created_at' => '2023-11-22 13:34:34','updated_at' => '2023-11-22 13:34:34'),
            array('id' => '19','no' => '432','hood_id' => '6','directorate_id' => '1','created_at' => '2023-11-22 13:34:46','updated_at' => '2023-11-22 13:34:46'),
            array('id' => '20','no' => '433','hood_id' => '6','directorate_id' => '1','created_at' => '2023-11-22 13:34:55','updated_at' => '2023-11-22 13:34:55'),
            array('id' => '21','no' => '452','hood_id' => '8','directorate_id' => '1','created_at' => '2023-11-22 13:35:15','updated_at' => '2023-11-22 13:35:15'),
            array('id' => '22','no' => '4A1','hood_id' => '8','directorate_id' => '1','created_at' => '2023-11-25 13:08:15','updated_at' => '2023-11-25 13:08:15')
        );
        foreach($hood_units as $hood_unit){
            HoodUnit::create([
                'id' => $hood_unit['id'],
                'no' => $hood_unit['no'],
                'hood_id' => $hood_unit['hood_id'],
                'directorate_id' => $hood_unit['directorate_id'],
            ]);
        }
    }
}
