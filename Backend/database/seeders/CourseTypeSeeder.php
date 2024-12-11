<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_types')->insert([
            ['course_type' => 'University Pathway'],
            ['course_type' => 'Career and Workplace'],
            ['course_type' => 'Special Programs'],
            ['course_type' => 'Online Courses'],
        ]);
    }
}
