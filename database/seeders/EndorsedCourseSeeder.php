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
                'course_name' => 'Engineering Mathematics',
                'course_code' => 'ENG 1005',
                'endorsed_course_name' => 'Differential Equations',
                'endorsed_course_code' => 'MATH 2310',
                'status' => true,
            ],
            [
                'university' => 'Universiti Teknikal Malaysia Melaka',
                'department_id' => 9, // Manufacturing Engineering
                'course_name' => 'FLUID MECHANICS I',
                'course_code' => 'BMCG 2613',
                'endorsed_course_name' => 'Fluid Mechanics',
                'endorsed_course_code' => 'MECH 2340',
                'status' => true,
            ],
            [
                'university' => 'Universiti Teknologi MARA Shah Alam',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'MECHANICS OF MATERIALS',
                'course_code' => 'MEC 411',
                'endorsed_course_name' => 'Mechanics of Materials',
                'endorsed_course_code' => 'MECH 2342',
                'status' => false,
            ],
            [
                'university' => 'Universiti Tun Hussein Onn Malaysia',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'Contract and Estimation',
                'course_code' => 'BFC 31602',
                'endorsed_course_name' => 'Contract and Estimation',
                'endorsed_course_code' => 'CIVE 3221',
                'status' => true,
            ],
            [
                'university' => 'Universiti Tun Hussein Onn Malaysia',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'Reinforced Concrete Design I',
                'course_code' => 'BFC 32102',
                'endorsed_course_name' => 'Reinforced Concrete Design I',
                'endorsed_course_code' => 'CIVE 3313',
                'status' => true,
            ],
            [
                'university' => 'Politeknik Ibrahim Sultan',
                'department_id' => 9, // Manufacturing Engineering
                'course_name' => 'Quality Control',
                'course_code' => 'DJF 6102',
                'endorsed_course_name' => 'Quality Control',
                'endorsed_course_code' => 'MANU 3313',
                'status' => true,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'Pre-calculus',
                'course_code' => 'MATH 1024',
                'endorsed_course_name' => 'Differential Equations',
                'endorsed_course_code' => 'MATH 2310',
                'status' => false,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'Calculus I',
                'course_code' => 'MATH 1034',
                'endorsed_course_name' => 'Engineering Calculus I',
                'endorsed_course_code' => 'MTH 1112',
                'status' => true,
            ],
            [
                'university' => 'Univeriti Kebangsaan Malaysia',
                'department_id' => 3, // Biotechnology Engineering
                'course_name' => 'Biochemistry and Biomolecular Engineering',
                'course_code' => 'KKKR 3563',
                'endorsed_course_name' => 'Biochemistry',
                'endorsed_course_code' => 'BTEN 2315',
                'status' => false,
            ],
            [
                'university' => 'University Malaya',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'Circuit Analysis I',
                'course_code' => 'KIE 1005',
                'endorsed_course_name' => 'Circuit Analysis',
                'endorsed_course_code' => 'EECE 2312',
                'status' => true,
            ],
            [
                'university' => 'University Malaya',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'Electronic Circuit I',
                'course_code' => 'KIE 1007',
                'endorsed_course_name' => 'Electronic Circuits',
                'endorsed_course_code' => 'EECE 2313',
                'status' => false,
            ],
            [
                'university' => 'University Malaya',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'Digital Signal Processing',
                'course_code' => 'KIE 3007',
                'endorsed_course_name' => 'Digital Signal Processing',
                'endorsed_course_code' => 'EECE 3314',
                'status' => true,
            ],
            [
                'university' => 'Universiti Malaysia Perlis',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'HYDRAULIC AND HYDROLOGY',
                'course_code' => 'PAT 202/3',
                'endorsed_course_name' => 'Hydraulics',
                'endorsed_course_code' => 'CIVE 2323',
                'status' => false,
            ],
            [
                'university' => 'Universiti Malaysia Perlis',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'GEOTECHNIC',
                'course_code' => 'PAT253/3',
                'endorsed_course_name' => 'Geotechnical Engineering',
                'endorsed_course_code' => 'CIVE 3315',
                'status' => true,
            ],
            [
                'university' => 'Universiti Malaysia Perlis',
                'department_id' => 4, // Civil Engineering
                'course_name' => 'SOIL MECHANICS',
                'course_code' => 'PAT203/2',
                'endorsed_course_name' => 'Geology and Soil Mechanics',
                'endorsed_course_code' => 'CIVE 2315',
                'status' => false,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'Basic Statics for Engineering',
                'course_code' => 'ENGR 2013',
                'endorsed_course_name' => 'Statics',
                'endorsed_course_code' => 'MEC 1193',
                'status' => true,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'Calculus II',
                'course_code' => 'MATH 1044',
                'endorsed_course_name' => 'Engineering Calculus II',
                'endorsed_course_code' => 'MTH 1212',
                'status' => true,
            ],
            [
                'university' => 'Sunway University',
                'department_id' => 6, // Electrical Computer and Information Engineering
                'course_name' => 'Digital Logic',
                'course_code' => 'ENGR 2064',
                'endorsed_course_name' => 'Digital Logic Design',
                'endorsed_course_code' => 'EECE 2311',
                'status' => false,
            ],
            [
                'university' => 'Universiti Putra Malaysia',
                'department_id' => 1, // Aerospace Engineering
                'course_name' => 'Aerodynamics I',
                'course_code' => 'EAS 3202',
                'endorsed_course_name' => 'Aerodynamics I',
                'endorsed_course_code' => 'MECH 3322',
                'status' => true,
            ],
            [
                'university' => 'Universiti Putra Malaysia',
                'department_id' => 1, // Aerospace Engineering
                'course_name' => 'Space Mechanics',
                'course_code' => 'EAS 3801',
                'endorsed_course_name' => 'Space Mechanics',
                'endorsed_course_code' => 'MECH 3220',
                'status' => true,
            ],
        ];

        foreach ($endorse_courses as $data) {
            EndorsedCourse::updateOrCreate(
                [
                    'university' => $data['university'],
                    'department_id' => $data['department_id'],
                    'course_name' => $data['course_name'],
                    'course_code' => $data['course_code'],
                    'endorsed_course_name' => $data['endorsed_course_name'],
                    'endorsed_course_code' => $data['endorsed_course_code'],
                    'status' => $data['status'],
                ],
                $data,
            );
        }
    }
}
