<?php

namespace Database\Seeders;

use App\Models\SuperUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = [
            [
                'password' => Hash::make('111'),
                'status' => 0,
            ]
        ];

        foreach ($item as $data) {
            SuperUser::updateOrCreate(
                [
                    'password' => $data['password'],
                    'status' => $data['status'],
                ],
                $data,
            );
        }
    }
}
