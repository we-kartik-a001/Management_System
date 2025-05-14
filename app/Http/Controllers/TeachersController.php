<?php

namespace App\Http\Controllers;

// Models 
use App\Models\Teacher;

// Request 
use App\Http\Requests\TeacherStoreRequest;
use App\Models\Course;
// Repository
use App\Repositories\CourseRepository;


class TeachersController extends Controller
{
    /**
     * Disaply the number of teachers 
     */
    public function index()
    {
        $teachers = Teacher::with('course')->paginate(10);
        return view('teacher.index.teacherIndex', compact('teachers'));
    }

    /**
     * create teacher 
     */
    public function create()
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        return (view('teacher.create.teacherCreate', compact('courses')));
    }

    /*
     * Store teacher 
     */
    public function store(TeacherStoreRequest $request)
    {
        $input = $request->validated();

        if ($input) {
            Teacher::create($input);
        } 
        return redirect()->route('teacher.index');
    }

    /**
     * Edit teacher
     */
    public function edit(Teacher $teacher)
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        return view('teacher.edit.teacherEdit', compact('teacher', 'courses'));
    }

    public function update(TeacherStoreRequest $request, Teacher $teacher)
    {
        $input = $request->validated();

        $teacher->update($input);

        return redirect(route('teacher.edit', $teacher->id));
    }

    public function delete(Teacher $teacher)
    {
        // dd($teacher);        

        $teacher->delete();

        return redirect(route('teacher.index'));
    }
}
