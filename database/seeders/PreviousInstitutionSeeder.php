<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Department;
use App\Models\PreviousInstitution;
use Illuminate\Database\Seeder;

class PreviousInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prevInstitutions = [
            [
                'matric_no' => '2010613',
                'name' => 'Universiti Teknologi Malaysia',
                'degree_status' => true,
                'degree_or_diploma_name' => 'Computer Science',
                'year_of_study' => 2,
                'reason_of_leaving' => 'Professor recommendation',
                'cgpa' => 3.72,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($prevInstitutions as $data) {
            PreviousInstitution::updateOrCreate(
                [
                    'matric_no' => $data['matric_no'],
                    'name' => $data['name'],
                    'degree_status' => $data['degree_status'],
                    'degree_or_diploma_name' => $data['degree_or_diploma_name'],
                    'year_of_study' => $data['year_of_study'],
                    'reason_of_leaving' => $data['reason_of_leaving'],
                    'cgpa' => $data['cgpa'],
                    'created_at' => $data['created_at'],
                    'updated_at' => $data['updated_at'],
                ],
                $data,
            );
        }
    }
}
