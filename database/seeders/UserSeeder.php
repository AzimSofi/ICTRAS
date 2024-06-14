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
                // ADMIN
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
            // HOD
            [
                'name' => 'HOD of AERO',
                'matric_no' => 'HOD_aero',
                'password' => Hash::make('HOD_aeroHOD_aero'),
                'email' => 'HOD_aero@iium.edu.my',
                'profile_picture' => 0,
                'department_id' => 1,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of AUTO',
                'matric_no' => 'HOD_auto',
                'password' => Hash::make('HOD_autoHOD_auto'),
                'email' => 'HOD_auto@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 2,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of BIO',
                'matric_no' => 'HOD_bio',
                'password' => Hash::make('HOD_bioHOD_bio'),
                'email' => 'HOD_bio@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 3,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of CIV',
                'matric_no' => 'HOD_civ',
                'password' => Hash::make('HOD_civHOD_civ'),
                'email' => 'HOD_civ@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 4,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of COMM',
                'matric_no' => 'HOD_comm',
                'password' => Hash::make('HOD_commHOD_comm'),
                'email' => 'HOD_comm@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 5,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of ECIE',
                'matric_no' => 'HOD_cie',
                'password' => Hash::make('HOD_cieHOD_cie'),
                'email' => 'HOD_cie@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 6,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of MANU',
                'matric_no' => 'HOD_manu',
                'password' => Hash::make('HOD_manuHOD_manu'),
                'email' => 'HOD_manu@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 7,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of MATER',
                'matric_no' => 'HOD_mater',
                'password' => Hash::make('HOD_materHOD_mater'),
                'email' => 'HOD_mater@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 8,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HOD of MECH',
                'matric_no' => 'HOD_mech',
                'password' => Hash::make('HOD_mechHOD_mech'),
                'email' => 'HOD_mech@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 9,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // LECTURER
            [
                'name' => 'AERO Lecturer #1',
                'matric_no' => 'AERO1',
                'password' => Hash::make('AERO1AERO1'),
                'email' => 'AERO1@iium.edu.my',
                'profile_picture' => 0,
                'department_id' => 1,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AUTO Lecturer #1',
                'matric_no' => 'AUTO1',
                'password' => Hash::make('AUTO1AUTO1'),
                'email' => 'AUTO1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 2,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BIO Lecturer #1',
                'matric_no' => 'BIO1',
                'password' => Hash::make('BIO1BIO1'),
                'email' => 'BIO1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 3,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'CIV Lecturer #1',
                'matric_no' => 'CIV1',
                'password' => Hash::make('CIV1CIV1'),
                'email' => 'CIV1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 4,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'COMM Lecturer #1',
                'matric_no' => 'COMM1',
                'password' => Hash::make('COMM1COMM1'),
                'email' => 'AERO1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 5,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ECIE Lecturer #1',
                'matric_no' => 'ECIE1',
                'password' => Hash::make('ECIE1ECIE1'),
                'email' => 'ECIE1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 6,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MANU Lecturer #1',
                'matric_no' => 'MANU1',
                'password' => Hash::make('MANU1MANU1'),
                'email' => 'AERO1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 7,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MATER Lecturer #1',
                'matric_no' => 'MATER1',
                'password' => Hash::make('MATER1MATER1'),
                'email' => 'MATER1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 8,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MECH Lecturer #1',
                'matric_no' => 'MECH1',
                'password' => Hash::make('MECH1MECH1'),
                'email' => 'MECH1@iium.edu.my',
                'profile_picture' => null,
                'department_id' => 9,
                'phone_number' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // STUDENT
            [
                'name' => 'Takagi',
                'matric_no' => '2020202',
                'password' => Hash::make('20202022020202'),
                'email' => 'Takagi@san.com',
                'profile_picture' => '2020202.png',
                'department_id' => 1,
                'phone_number' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nishikata',
                'matric_no' => '2121212',
                'password' => Hash::make('21212122121212'),
                'email' => 'Nishi@kata.com',
                'profile_picture' => '2121212.png',
                'department_id' => 4,
                'phone_number' => '0134567892',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Azim Iskandar Bin Mohd Sofi',
                'matric_no' => '2010613',
                'password' => Hash::make('20106132010613'),
                'email' => 'azim.sofi@live.iium.com.my',
                'profile_picture' => '2010613.png',
                'department_id' => 1,
                'phone_number' => '0193100784',
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

            if ($data['matric_no'] === 'admin') {
                $user->assignRole('admin');
            } elseif (str_contains($data['name'], 'Lecturer')) {
                $user->assignRole('lecturer');
            } elseif (str_contains($data['name'],'HOD of')) {
                $user->assignRole('hod');
            } else {
                $user->assignRole('student');
            }
        }
    }
}
