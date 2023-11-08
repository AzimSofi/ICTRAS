<?php

namespace Database\Seeders;

use App\Models\EndorsedCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EndorsedCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $endorse_courses = [
            [
                'university' => 'Monash University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'ENG1005 - Engineering Mathematics',
                'endorsed_course_name' => 'MATH2310 - Differential Equations',
                'status' => true,
            ],
            [
                'university' => 'Universiti Teknikal Malaysia Melaka',
                'department_id' => 9, // Manufacturing Engineering
                'course_name' => 'BMCG 2613 - FLUID MECHANICS I',
                'endorsed_course_name' => 'MECH2340 - Fluid Mechanics',
                'status' => true,
            ],
            [
                'university' => 'Universiti Teknologi MARA Shah Alam',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'MEC411 - MECHANICS OF MATERIALS',
                'endorsed_course_name' => 'MECH 2342 - Mechanics of Materials',
                'status' => false,
            ],
            [
                'university' => 'Universiti Tun Hussein Onn Malaysia',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'BFC 31602 - Contract and Estimation',
                'endorsed_course_name' => 'CIVE 3221 - Contract and Estimation',
                'status' => true,
            ],
            [
                'university' => 'Universiti Tun Hussein Onn Malaysia',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'BFC 32102 - Reinforced Concrete Design I',
                'endorsed_course_name' => 'CIVE 3313 - Reinforced Concrete Design I',
                'status' => true,
            ],
            [
                'university' => 'Politeknik Ibrahim Sultan',
                'department_id' => 9, // Manufacturing Engineering
                'course_name' => 'DJF6102 - Quality Control',
                'endorsed_course_name' => 'MANU 3313 - Quality Control',
                'status' => true,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'MATH 1024 - Pre-calculus',
                'endorsed_course_name' => 'MATH2310 - Differential Equations',
                'status' => false,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'MATH 1034 - Calculus I',
                'endorsed_course_name' => 'MTH 1112 - Engineering Calculus I',
                'status' => true,
            ],
            [
                'university' => 'Univeriti Kebangsaan Malaysia',
                'department_id' => 3, // Biotechnology Engineering
                'course_name' => 'KKKR3563 - Biochemistry and Biomolecular Engineering',
                'endorsed_course_name' => 'BTEN 2315 - Biochemistry',
                'status' => false,
            ],
            [
                'university' => 'University Malaya',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'KIE1005 - Circuit Analysis I',
                'endorsed_course_name' => 'EECE 2312 - Circuit Analysis',
                'status' => true,
            ],
            [
                'university' => 'University Malaya',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'KIE1007 - Electronic Circuit I',
                'endorsed_course_name' => 'EECE 2313 - Electronic Circuits',
                'status' => false,
            ],
            [
                'university' => 'University Malaya',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'KIE3007 - Digital Signal Processing',
                'endorsed_course_name' => 'EECE 3314 - Digital Signal Processing',
                'status' => true,
            ],
            [
                'university' => 'Universiti Malaysia Perlis',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'PAT 202/3 - HYDRAULIC AND HYDROLOGY',
                'endorsed_course_name' => 'CIVE 2323 - Hydraulics',
                'status' => false,
            ],
            [
                'university' => 'Universiti Malaysia Perlis',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'PAT253/3 - GEOTECHNIC',
                'endorsed_course_name' => 'CIVE 3315 - Geotechnical Engineering',
                'status' => true,
            ],
            [
                'university' => 'Universiti Malaysia Perlis',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'PAT203/2 - SOIL MECHANICS',
                'endorsed_course_name' => 'CIVE 2315 - Geology and Soil Mechanics',
                'status' => false,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'ENGR 2013 - Basic Statics for Engineering',
                'endorsed_course_name' => 'MEC 1193 - Statics',
                'status' => true,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'MATH 1044 - Calculus II',
                'endorsed_course_name' => 'MTH 1212 - Engineering Calculus II',
                'status' => true,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'ENGR 2064 - Digital Logic',
                'endorsed_course_name' => 'EECE 2311 - Digital Logic Design',
                'status' => false,
            ],
            [
                'university' => 'Universiti Putra Malaysia',
                'department_id' => 1, // Aerospace Engineering
                'course_name' => 'EAS 3202 - Aerodynamics I',
                'endorsed_course_name' => 'MECH 3322 - Aerodynamics I',
                'status' => true,
            ],
            [
                'university' => 'Universiti Putra Malaysia',
                'department_id' => 1, // Aerospace Engineering
                'course_name' => 'EAS 3801 - Space Mechanics',
                'endorsed_course_name' => 'MECH 3220 - Space Mechanics',
                'status' => true,
            ],
            // Add more elements as needed
        ];

        foreach ($endorse_courses as $data) {
            EndorsedCourse::updateOrCreate(
                [
                    'university' => $data['university'],
                    'department_id' => $data['department_id'],
                    'course_name' => $data['course_name'],
                    'endorsed_course_name' => $data['endorsed_course_name'],
                    'status' => $data['status'],
                ],
                $data,
            );
        }
    }
}
