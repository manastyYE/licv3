<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->fullname = 'ahmed';
        $user->username = 'ahmed';
        $user->phone = '772142111';
        $user->password = bcrypt('772142111');
        $user->directorate_id = 1;
        $user->hood_id =1;
        $user->office_id = 1;
        $user->save();

    }
}
