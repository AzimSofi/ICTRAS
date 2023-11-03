<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'ADMIN',
                'matric_no' => 'admin',
                'password' => Hash::make('123'),
                'email' => '',
                'department' => null,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ADMIN',
                'matric_no' => '202020',
                'password' => Hash::make('202020202020'),
                'email' => 'Takagi@san.com',
                'department' => 1,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                [
                    'name' => $data['name'],
                    'matric_no' => $data['matric_no'],
                    'password' => $data['password'],
                    'email' => $data['email'],
                    'department' => $data['department'],
                    'phone_number' => $data['phone_number'],
                    'created_at' => $data['created_at'],
                    'updated_at' => $data['updated_at'],
                ],
                $data,
            );
        }
    }
}
