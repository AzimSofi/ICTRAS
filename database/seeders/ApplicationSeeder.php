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
        // $pdfPath = storage_path('app/pdfs/sample.pdf');
        // $pdfContent = file_get_contents($pdfPath);

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
                'user' => '2010613',
                'course_code' => 'SSCE 1793',
                'course_name' => 'Differential Equations',
                // 'department_id' => '6',
                'endorsed_course_name' => 'Differential Equations',
                'endorsed_course_code' => 'MATH 2310',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => null,
                'course_description' => 'This is an introductory course on differential equations. Topics include first order ordinary differential equations (ODEs), linear second order ODEs with constant coefficients up to fourth order, the Laplace transform and its inverse, Fourier series, and partial differential equations (PDEs). Students will learn how to classify and solve first order ODEs, use the techniques of undetermined coefficients, variation of parameters and the Laplace transform to solve ODEs with specified initial and boundary conditions, and use the technique of separation of variables to solve linear second order PDEs and the method of d’Alembert to solve wave equation. ',
            ],
            [
                'user' => '2121212',
                'course_code' => 'GHI 9123',
                'course_name' => 'Aerodynamics I',
                // 'department_id' => '1',
                'endorsed_course_name' => 'Aerodynamics I',
                'endorsed_course_code' => 'MECH 3322',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => null,
                'course_description' => 'This course introduces students to the principles of aerodynamics, including the behavior of gases, flow patterns around objects, and the forces involved in flight. Practical applications in aerospace engineering are explored.',
            ],
            [
                'user' => '2121212',
                'course_code' => 'KIE 3008',
                'course_name' => 'Power System',
                // 'department_id' => '1',
                'endorsed_course_name' => 'Introduction to Electrical Power Systems',
                'endorsed_course_code' => 'EECE 3311',
                'credit_hours' => '3',
                'grade_obtained' => 'B',
                'status' => null,
                'pdf_name' => 'KIE3008_BR006',
                'pdf_content' => file_get_contents(storage_path('app\application_pdf_content\KIE3008_BR006.pdf')),
                'course_description' => 'The course covers the introduction to the power electronics devices, cooling systems, and device protection. Power Electronics circuit such as uncontrolled and controlled DC (single and three phases), different types of DC to DC converter, and single and three phases rectifier and inverter is introduced. The student will be introduced to voltage control technique and pulse width modulation techniques design.',
            ],
            [
                'user' => '2020202',
                'course_code' => 'KIE 1005',
                'course_name' => 'Circuit Analysis I',
                'department_id' => '6',
                'endorsed_course_name' => 'Circuit Analysis',
                'endorsed_course_code' => 'EECE 2312',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => '1',
                'course_description' => 'This course introduces the fundamental theorems and analysis techniques for problem-solving in electrical circuits. It encompasses the techniques for analysing the DC and AC circuits, the transient response of RL and RC and RLC circuits, and the sinusoidal steady-state power calculation.',
            ],
            [
                'user' => '2020202',
                'course_code' => 'KIE 2007',
                'course_name' => 'Basic Electromagnetics',
                'department_id' => '1',
                'endorsed_course_name' => 'Engineering Electromagnetics',
                'endorsed_course_code' => 'EECE 2315',
                'credit_hours' => '3',
                'grade_obtained' => 'A',
                'status' => null,
                'pdf_name' => 'KIE3008_BR006',
                'pdf_content' => file_get_contents(storage_path('app\application_pdf_content\KIE2007_BR006.pdf')),
                'course_description' => 'This course gives an introduction to static electromagnetic fields. The student is first given a grounding in vector analysis. Then, electrostatics are introduced, with emphasis on electrostatic vector fields, electrical materials, capacitors and its derived energy and forces. Then, magnetostatics are given similar treatment regarding magnetostatic vector fields, magnetic materials, inductors and its derived energy, force and torque. Boundary value problems in static electromagnetics are also addressed.',
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
