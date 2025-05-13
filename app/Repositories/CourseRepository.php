<?php 

namespace App\Repositories;

// Models 
use App\Models\Course;

Class CourseRepository{
    
    /**
     * array $data
     * use to insert the multiple data at a same time in the database 
     */
    public function store($data)
    {
        return Course::insert($data);
    }

    // Plucking the courses by their names and id 
    public function pluckCoursesByNameAndId()
    {
        return Course::pluck('name', 'id');
    }
}