<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Admin', 
            'email'    => 'admin@admin.com', 
            'password' => bcrypt('@@Bladepro@123@@'), 
            'email_verified_at' => Carbon::now(),
            'role'=>1, 
        ]);

        User::create([
            'name'     => 'Asraf', 
            'email'    => 'asraf@gmail.com', 
            'password' => bcrypt('asrafmridha'), 
            'email_verified_at' => Carbon::now(),
            'role'=>3,   
        ]); 
    }
}
