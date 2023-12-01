<?php

namespace Database\Seeders;

use App\Models\Billboard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $billboards = array(
            array('id' => '1','name' => 'جانبية','price' => '5000','created_at' => NULL,'updated_at' => '2023-11-18 00:06:25'),
            array('id' => '2','name' => 'امامي','price' => '3000','created_at' => '2023-11-18 00:14:12','updated_at' => '2023-11-18 00:14:12'),
            array('id' => '3','name' => 'جدارية','price' => '8000','created_at' => '2023-11-18 00:14:46','updated_at' => '2023-11-18 00:14:46'),
            array('id' => '4','name' => 'لواصق على الزجاج او البردات','price' => '2000','created_at' => '2023-11-18 00:15:40','updated_at' => '2023-11-18 00:15:40'),
            array('id' => '5','name' => 'سطحية','price' => '8000','created_at' => '2023-11-18 00:20:02','updated_at' => '2023-11-18 00:20:02')
          );
        foreach($billboards as $billboard){
            Billboard::create([
                'id' => $billboard['id'],
                'name' => $billboard['name'],
                'price' => $billboard['price'],
            ]);
        }
    }
}
