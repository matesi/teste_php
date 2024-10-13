<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            'name' => 'Test Patient',
            'birth' => formatDateToDB('21/12/1990'),
            'code' => '1234',
            'guide' => '4321',
            'entrance' => formatDateToDB('21/01/2024'),
            'departure' => formatDateToDB('25/01/2024'),
            'created_at' => now(),
        ]);
    }
}
