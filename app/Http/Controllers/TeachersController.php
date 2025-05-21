<?php

namespace App\Http\Controllers;

// Models 
use App\Models\Teacher;

// Request 
use App\Http\Requests\TeacherStoreRequest;

// Repository
use App\Repositories\CourseRepository;

//Session
use Illuminate\Support\Facades\Session;

class TeachersController extends Controller
{
    /**
     * Display the number of teachers 
     */
    public function index()
    {
        $teachers = Teacher::with('course', 'creator')->paginate(10);

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
            Session::flash('success', 'The Teacher created succesfully');

            Teacher::create($input);
        }else{
             Session::flash('failure', 'The Teacher is not created succesfully');
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

    /**
     * Update Teacher
     */
    public function update(TeacherStoreRequest $request, Teacher $teacher)
    {
        $update = $request->validated();

        if ($update) {
            Session::flash('success', 'The Teacher updated succesfully');
            $teacher->update($update);
        }

        Session::flash('failure', 'The Teacher is not updated succesfully');
        return redirect(route('teacher.edit', $teacher->id));
    }

    /**
     * Delete teacher
     */
    public function delete(Teacher $teacher)
    {
        // dd($teacher);        

        $teacher->delete();

        return redirect(route('teacher.index'));
    }
}
