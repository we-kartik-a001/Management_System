<?php

namespace App\Http\Controllers;

//Models
use App\Models\Student;

//Request
use App\Http\Requests\StudentRequest;

//Repository
use App\Repositories\CourseRepository;
use App\Repositories\TeacherRepository;

class StudentsController extends Controller
{   
    public function index()
    {
        return(view('student.index.studentIndex'));
    }

    // Create student
    public function create()
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        $teachers =(new TeacherRepository)->pluckTeachersByNameAndId();
        
        return(view('student.create.studentCreate',compact('courses','teachers')));
    }

    public function store(StudentRequest $request)
    {
        $input = $request->validated();

        Student::create($input);

        return redirect(route('student.index'));

    }
}
