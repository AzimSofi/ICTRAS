<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'department_code' => 'AERO',
                'department_name' => 'Aerospace engineering ',
            ],
            [
                'department_code' => 'AUTO',
                'department_name' => 'Automotive Engineering',
            ],
            [
                'department_code' => 'BIO',
                'department_name' => 'Biotechnology engineering',
            ],
            [
                'department_code' => 'CIV',
                'department_name' => 'Civil Engineering',
            ],
            [
                'department_code' => 'COMM',
                'department_name' => 'Communication Engineering ',
            ],
            [
                'department_code' => 'ECIE',
                'department_name' => 'Electrical Computer and Information Engineering ',
            ],
            [
                'department_code' => 'MANU',
                'department_name' => 'Manufacturing Engineering ',
            ],
            [
                'department_code' => 'MATER',
                'department_name' => 'Material Engineering ',
            ],
            [
                'department_code' => 'MECH',
                'department_name' => 'Mechatronics engineering  ',
            ],
        ];

        foreach ($departments as $data) {
            Department::updateOrCreate(
                [
                    'department_code' => $data['department_code'],
                    'department_name' => $data['department_name'],
                ],
                $data,
            );
        }
    }
}
