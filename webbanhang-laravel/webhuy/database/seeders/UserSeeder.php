<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'superadmin@webhuy.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@webhuy.com',
                'password' => Hash::make('manager123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Staff Member',
                'email' => 'staff@webhuy.com',
                'password' => Hash::make('staff123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Nguyễn Văn Admin',
                'email' => 'nguyenvanadmin@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Trần Thị Manager',
                'email' => 'tranthimanager@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}