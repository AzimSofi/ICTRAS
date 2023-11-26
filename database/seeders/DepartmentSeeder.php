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
                'code' => 'AERO',
                'name' => 'Aerospace engineering',
            ],
            [
                'code' => 'AUTO',
                'name' => 'Automotive Engineering',
            ],
            [
                'code' => 'BIO',
                'name' => 'Biotechnology engineering',
            ],
            [
                'code' => 'CIV',
                'name' => 'Civil Engineering',
            ],
            [
                'code' => 'COMM',
                'name' => 'Communication Engineering',
            ],
            [
                'code' => 'ECIE',
                'name' => 'Electrical Computer and Information Engineering',
            ],
            [
                'code' => 'MANU',
                'name' => 'Manufacturing Engineering',
            ],
            [
                'code' => 'MATER',
                'name' => 'Material Engineering',
            ],
            [
                'code' => 'MECH',
                'name' => 'Mechatronics engineering',
            ],
        ];

        foreach ($departments as $data) {
            Department::updateOrCreate(
                [
                    'code' => $data['code'],
                    'name' => $data['name'],
                ],
                $data,
            );
        }
    }
}
