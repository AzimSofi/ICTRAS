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
                'course_code' => 'KIE1007',
                'course_name' => 'Electronic Circuit I',
                'credit_hours' => '3',
                'grade_obtained' => 'B',
                'status' => '0',
            ],
            [
                'user' => '2010613',
                'course_code' => 'KIE3007',
                'course_name' => 'Digital Signal Processing',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => '1',
            ],
            [
                'user' => '2010613',
                'course_code' => 'ABC1234',
                'course_name' => 'Math 1',
                'credit_hours' => '3',
                'grade_obtained' => 'C',
                'status' => null,
            ],
            [
                'user' => '202020',
                'course_code' => 'ABC1234',
                'course_name' => 'Math 1',
                'credit_hours' => '3',
                'grade_obtained' => 'B',
                'status' => null,
            ],
            [
                'user' => '2010613',
                'course_code' => 'DEF5678',
                'course_name' => 'Math 2',
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
                    'credit_hours' => $data['credit_hours'],
                    'grade_obtained' => $data['grade_obtained'],
                    'status' => $data['status'],
                ],
                $data,
            );
        }
    }
}
