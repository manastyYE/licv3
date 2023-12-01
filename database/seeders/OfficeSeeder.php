<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = array(
            array('id' => '1','name' => 'الصحة','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'السياحة','created_at' => '2023-11-05 09:24:34','updated_at' => '2023-11-05 09:24:34'),
            array('id' => '3','name' => 'الثقافة','created_at' => '2023-11-18 00:17:36','updated_at' => '2023-11-18 00:17:36'),
            array('id' => '4','name' => 'اخرى','created_at' => '2023-11-18 00:18:15','updated_at' => '2023-11-18 00:18:15')
          );
        foreach($offices as $office){
            Office::create([
                'id' => $office['id'],
                'name' => $office['name'],
            ]);
        }
    }
}
