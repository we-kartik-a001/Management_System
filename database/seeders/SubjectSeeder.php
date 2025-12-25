<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        if (DB::table('subjects')->count() == 0) {
            $subjects = [
                ['name' => 'Mathematics', 'description' => 'Engineering Mathematics basics'],
                ['name' => 'Physics', 'description' => 'Fundamental Physics concepts'],
                ['name' => 'Computer Programming', 'description' => 'Introduction to programming'],
                ['name' => 'Electronics', 'description' => 'Basics of electronics'],
                ['name' => 'Biology', 'description' => 'Study of living organisms'],
                ['name' => 'Chemistry', 'description' => 'Basic chemistry concepts'],
                ['name' => 'Statistics', 'description' => 'Introductory statistics'],
                ['name' => 'Accounting', 'description' => 'Financial accounting basics'],
                ['name' => 'Economics', 'description' => 'Principles of economics'],
                ['name' => 'Business Law', 'description' => 'Legal aspects of business'],
                ['name' => 'Taxation', 'description' => 'Basics of taxation system'],
                ['name' => 'Marketing Management', 'description' => 'Marketing principles and strategies'],
                ['name' => 'Finance', 'description' => 'Corporate finance fundamentals'],
                ['name' => 'Organizational Behavior', 'description' => 'Behavioral studies within organizations'],
                ['name' => 'Operations Management', 'description' => 'Managing of operations'],
                ['name' => 'History', 'description' => 'World history overview'],
                ['name' => 'Sociology', 'description' => 'Study of society'],
                ['name' => 'Psychology', 'description' => 'Human behavior and mind'],
                ['name' => 'Philosophy', 'description' => 'Philosophical concepts and ideas'],
                ['name' => 'Computer Fundamentals', 'description' => 'Introduction to computers'],
                ['name' => 'Office Automation', 'description' => 'Use of office software tools'],
                ['name' => 'Database Management', 'description' => 'Basics of database systems'],
                ['name' => 'Web Designing', 'description' => 'Introduction to designing websites'],
            ];

            foreach ($subjects as $subject) {
                DB::table('subjects')->insert([
                    'name' => $subject['name'],
                    'description' => $subject['description'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
