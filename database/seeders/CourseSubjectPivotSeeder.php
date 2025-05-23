<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSubjectPivotSeeder extends Seeder
{
    public function run()
    {
        $now = now();

        // Get courses with keys = name, values = id
        $courses = DB::table('courses')->pluck('id', 'name')->toArray();

        // Get subjects with keys = name, values = id
        $subjects = DB::table('subjects')->pluck('id', 'name')->toArray();

        // Define which subjects belong to which courses by course name and subject names
        $courseSubjects = [
            'Bachelor of Technology' => ['Mathematics', 'Physics', 'Computer Programming', 'Electronics'],
            'Bachelor of Science' => ['Biology', 'Chemistry', 'Physics', 'Statistics'],
            'Bachelor of Commerce' => ['Accounting', 'Economics', 'Business Law', 'Taxation'],
            'Master of Business Administration' => ['Marketing Management', 'Finance', 'Organizational Behavior', 'Operations Management'],
            'Bachelor of Arts' => ['History', 'Sociology', 'Psychology', 'Philosophy'],
            'Diploma in Computer Applications' => ['Computer Fundamentals', 'Office Automation', 'Database Management', 'Web Designing'],
        ];

        foreach ($courseSubjects as $courseName => $subjectNames) {
            // Check if the course exists in DB
            if (!isset($courses[$courseName])) {
                continue; // Skip if no such course
            }
            $courseId = $courses[$courseName];

            foreach ($subjectNames as $subjectName) {
                // Check if subject exists
                if (!isset($subjects[$subjectName])) {
                    continue; // Skip if subject not found
                }

                $subjectId = $subjects[$subjectName];

                // Insert into pivot table if not exists
                $exists = DB::table('courses_subjects')
                    ->where('course_id', $courseId)
                    ->where('subject_id', $subjectId)
                    ->exists();

                if (!$exists) {
                    DB::table('courses_subjects')->insert([
                        'course_id' => $courseId,
                        'subject_id' => $subjectId,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }
        }
    }
}