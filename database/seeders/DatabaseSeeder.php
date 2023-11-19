<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password'=>'123456789',

        // ]);
        // $password=123456789;
        // DB::table('users')->insert([
        //     'name' => Str::random(1),
        //     'email' => 'admin@gmail.com',
        //     'password' =>bcrypt($password),
        //     'email_verified_at'=> '2023-09-10',
        //     'remember_token'=>'zAMJi9VZ1w',
        //     // `updated_at`=>' 2023-09-10 21:35:27',
        //     //  `created_at`=>' 2023-09-10 21:35:27',
        //     'rolls'=>["1","2","3","4"],
        //     'user_status_id'=>1
        // ]);
    }
}
