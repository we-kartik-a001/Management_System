<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//Reopsitory
use App\Repositories\CourseRepository;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $courseRepository;

    /**
     * creating the objects
     */
    public function __construct()
    {
        $this->courseRepository = new CourseRepository();
    }


    public function run(): void
    {
        if (DB::table('courses')->count() == 0) {
            $courses = [
                ['name' => 'Bachelor of Technology', 'description' => 'Engineering course', 'duration' => 48, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Bachelor of Science', 'description' => 'Science course', 'duration' => 36, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Bachelor of Commerce', 'description' => 'Commerce course', 'duration' => 36, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Master of Business Administration', 'description' => 'Postgraduate business degree', 'duration' => 24, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Bachelor of Arts', 'description' => 'Arts course', 'duration' => 36, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Diploma in Computer Applications', 'description' => 'Short-term computer course', 'duration' => 12, 'created_at' => now(), 'updated_at' => now()],
            ];

            $this->courseRepository->store($courses);
        }
    }
}
