<?php 

namespace App\Repositories;

// Models 
use App\Models\Teacher;

Class TeacherRepository{

    // Plucking the courses by their names and id 
    public function pluckTeachersByNameAndId()
    {
        return Teacher::pluck('name', 'id');
    }
}