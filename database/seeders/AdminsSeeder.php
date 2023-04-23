<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                [
                    'id'=> 1,
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password'=> bcrypt('adminadmin'),
                ]
            ];
        Admin::insert($data);   
        error_log('Admins Seeder has been run successfully.');

    }
}
