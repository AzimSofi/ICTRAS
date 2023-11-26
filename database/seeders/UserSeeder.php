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
                'email' => 'webmaster@iium.edu.my',
                'profile_picture' => null,
                'department_id' => null,
                'phone_number' => '+603 6421 6421',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Takagi',
                'matric_no' => '202020',
                'password' => Hash::make('202020202020'),
                'email' => 'Takagi@san.com',
                'profile_picture' => '202020.png',
                'department_id' => 1,
                'phone_number' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nishikata',
                'matric_no' => '212121',
                'password' => Hash::make('212121212121'),
                'email' => 'Nishi@kata.com',
                'profile_picture' => '212121.png',
                'department_id' => 4,
                'phone_number' => '0134567892',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate([
                'name' => $data['name'],
                'matric_no' => $data['matric_no'],
                'password' => $data['password'],
                'email' => $data['email'],
                'profile_picture' => $data['profile_picture'],
                'department_id' => $data['department_id'],
                'phone_number' => $data['phone_number'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
            ]);

            if ($data['name'] === 'ADMIN') {
                $user->assignRole('admin');
            } else {
                $user->assignRole('student');
            }
        }
    }
}
