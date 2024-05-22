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
                'course_description' => 'This course focuses on the fundamental principles and applications of electronic circuits. Students will acquire practical skills in the design, analysis, and troubleshooting of electronic circuits.',
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
                'course_description' => 'In this course, students will learn about the fundamental concepts and techniques of digital signal processing. Topics explored include digital filtering, signal transformation, and frequency analysis.',
            ],
            [
                'user' => '2010613',
                'course_code' => 'ABC 1234',
                'course_name' => 'Math 1',
                // 'department_id' => '4',
                'endorsed_course_name' => 'Engineering Calculus I',
                'endorsed_course_code' => 'MTH 1112',
                'credit_hours' => '3',
                'grade_obtained' => 'B',
                'status' => null,
                'course_description' => 'This course covers the fundamental principles of calculus with applications relevant to engineering. Topics include limits, derivatives, integrals, and their applications in solving engineering problems.',
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
                'course_description' => 'This course covers the fundamental principles of calculus with applications relevant to engineering. Topics include limits, derivatives, integrals, and their applications in solving engineering problems.',
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
                'course_description' => 'This course extends the principles of calculus introduced in Math 1 to include techniques of integration, infinite series, and differential equations relevant to engineering applications.',
            ],
            [
                'user' => '212121',
                'course_code' => 'GHI 9123',
                'course_name' => 'Aerodynamics I',
                'department_id' => '1',
                'endorsed_course_name' => 'Aerodynamics I',
                'endorsed_course_code' => 'MECH 3322',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => null,
                'course_description' => 'This course introduces students to the principles of aerodynamics, including the behavior of gases, flow patterns around objects, and the forces involved in flight. Practical applications in aerospace engineering are explored.',
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
