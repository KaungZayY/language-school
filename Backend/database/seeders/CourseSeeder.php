<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'title' => 'Communicative English',
                'description' => 'Beginner course for course type 1',
                'levels' => 'Beginner',
                'schedule' => 'Monday and Wednesday, 10 AM - 12 PM',
                'max_class_size' => 25,
                'avg_class_size' => 18,
                'duration' => '6 weeks',
                'start_date' => '2024-01-15',
                'course_type_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'University English',
                'description' => 'Intermediate course for course type 1',
                'levels' => 'Intermediate',
                'schedule' => 'Tuesday and Thursday, 2 PM - 4 PM',
                'max_class_size' => 20,
                'avg_class_size' => 16,
                'duration' => '8 weeks',
                'start_date' => '2024-02-01',
                'course_type_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Special Program English',
                'description' => 'Advanced course for course type 1',
                'levels' => 'Advanced',
                'schedule' => 'Friday, 3 PM - 6 PM',
                'max_class_size' => 15,
                'avg_class_size' => 12,
                'duration' => '10 weeks',
                'start_date' => '2024-03-01',
                'course_type_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Advanced Online Course',
                'description' => 'Specialized course for course type 1',
                'levels' => 'Specialized',
                'schedule' => 'Saturday, 10 AM - 1 PM',
                'max_class_size' => 10,
                'avg_class_size' => 8,
                'duration' => '12 weeks',
                'start_date' => '2024-03-15',
                'course_type_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
