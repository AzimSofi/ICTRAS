<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Department;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = [
            [
                'user' => '2010613',
                'course_code' => 'KIE 1007',
                'course_name' => 'Electronic Circuit I',
                'department_id' => '6',
                'endorsed_course_name' => 'Electronic Circuits',
                'endorsed_course_code' => 'EECE 2313',
                'credit_hours' => '3',
                'grade_obtained' => 'B',
                'status' => '0',
            ],
            [
                'user' => '2010613',
                'course_code' => 'KIE 3007',
                'course_name' => 'Digital Signal Processing',
                'department_id' => '6',
                'endorsed_course_name' => 'Digital Signal Processing',
                'endorsed_course_code' => 'EECE 3314',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => '1',
            ],
            [
                'user' => '2010613',
                'course_code' => 'ABC 1234',
                'course_name' => 'Math 1',
                // 'department_id' => '4',
                'endorsed_course_name' => 'Engineering Calculus I',
                'endorsed_course_code' => 'MTH 1112',
                'credit_hours' => '3',
                'grade_obtained' => 'C',
                'status' => null,
            ],
            [
                'user' => '202020',
                'course_code' => 'ABC 1234',
                'course_name' => 'Math 1',
                // 'department_id' => '4',
                'endorsed_course_name' => 'Engineering Calculus I',
                'endorsed_course_code' => 'MTH 1112',
                'credit_hours' => '3',
                'grade_obtained' => 'B',
                'status' => null,
            ],
            [
                'user' => '2010613',
                'course_code' => 'DEF 5678',
                'course_name' => 'Math 2',
                // 'department_id' => '6',
                'endorsed_course_name' => 'Engineering Calculus II',
                'endorsed_course_code' => 'MTH 1212',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => null,
            ],
        ];

        foreach ($applications as $data) {
            Application::updateOrCreate(
                [
                    'user' => $data['user'],
                    'course_code' => $data['course_code'],
                    'course_name' => $data['course_name'],
                    'department_id' => $data['department_id'] ?? null,
                    'endorsed_course_name' => $data['endorsed_course_name'],
                    'endorsed_course_code' => $data['endorsed_course_code'],
                    'credit_hours' => $data['credit_hours'],
                    'grade_obtained' => $data['grade_obtained'],
                    'status' => $data['status'],
                ],
                $data,
            );
        }
    }
}
