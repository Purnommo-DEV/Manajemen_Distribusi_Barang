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

        // Roles::create([
        //     'role'     => 'superadmin',
        // ]);
        // Roles::create([
        //     'role'     => 'admin',
        // ]);
        // Roles::create([
        //     'role'     => 'marketing',
        // ]);
        // Roles::create([
        //     'role'     => 'produksi',
        // ]);

        // User::create([
        //     'nama'     => 'superadmin',
        //     'email'    => 'superadmin@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 1
        // ]);
        // User::create([
        //     'nama'     => 'admin',
        //     'email'    => 'admin@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 2
        // ]);
        // User::create([
        //     'nama'     => 'marketing',
        //     'email'    => 'marketing@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 3
        // ]);
        // User::create([
        //     'nama'     => 'produksi',
        //     'email'    => 'produksi@gmail.com',
        //     'password' => Hash::make('22222222'),
        //     'role_id' => 4
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
