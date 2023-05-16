<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Roles;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Roles::create([
            'role'     => 'admin',
        ]);
        Roles::create([
            'role'     => 'sales_retail',
        ]);
        Roles::create([
            'role'     => 'sales_ws',
        ]);
        Roles::create([
            'role'     => 'spv',
        ]);
        Roles::create([
            'role'     => 'gudang',
        ]);

        User::create([
            'nama'     => 'admin',
            'kode'     => 'admin-AD',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('22222222'),
            'role_id' => 1
        ]);
        // User::create([
        //     'nama'     => 'sales_retail',
        //     'email'    => 'sales_retail@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 2
        // ]);
        // User::create([
        //     'nama'     => 'sales_ws',
        //     'email'    => 'sales_ws@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 3
        // ]);
        // User::create([
        //     'nama'     => 'spv',
        //     'email'    => 'spv@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 4
        // ]);

        // User::create([
        //     'nama'     => 'gudang',
        //     'email'    => 'gudang@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 5
        // ]);
    }
}
