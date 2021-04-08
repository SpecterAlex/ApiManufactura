<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            "first_name" => "Miguel Alejandro",
            "last_name" => "Prado Calzada",
            "email" => "miguel.prado@stackcloud.com.mx",
            "phone_number" => "6188405157",
            "password" => "123456"
        ]);

        User::create([
            "first_name" => "Felipe",
            "last_name" => "Mateos Hernandez",
            "email" => "felipe.mateos@stackcloud.com.mx",
            "phone_number" => "8180105020",
            "password" => "123456"
        ]);

        User::factory(30)->create();
    }
}
