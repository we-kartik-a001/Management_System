<?php

namespace App\Http\Controllers;

// Models 
use App\Models\Teacher;
use App\Models\Subject;

// Request 
use App\Http\Requests\TeacherStoreRequest;

// Repository
use App\Repositories\CourseRepository;

//Session
use Illuminate\Support\Facades\Session;

// Mail
use App\Mail\SchoolInfo;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeachersController extends Controller
{
    /**
     * Display the number of teachers 
     */
    public function index(Request $request)
    {
        $selectedCourseId = $request->input('course_id');

        // Get teachers with relations (if needed)
        $teachers = Teacher::with('courses', 'creator', 'subjects')->paginate(10);

        // Get all courses for dropdown
        $courses = Course::all();

        // Get subjects related to selected course
        $subjects = collect();
        if ($selectedCourseId) {
            $subjects = Subject::whereHas('courses', function ($q) use ($selectedCourseId) {
                $q->where('courses.id', $selectedCourseId);
            })->get();
        }

        return view('teacher.index.teacherIndex', compact('teachers', 'courses', 'subjects', 'selectedCourseId'));
    }

    /**
     * create teacher 
     */
    public function create()
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        $subjects =  Subject::pluck('name', 'id');

        return (view('teacher.create.teacherCreate', compact('courses', 'subjects')));
    }

    /*
     * Store teacher 
     */
    public function store(TeacherStoreRequest $request)
    {
        $input = $request->validated();

        if ($input) {
            Session::flash('success', 'The Teacher created succesfully');

            $teachers =  Teacher::create($input);

            Mail::to($teachers->email)->send(new SchoolInfo($teachers));
        } else {
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

        // dd($teacher->date_of_birth);

        return view('teacher.edit.teacherEdit', compact('teacher', 'courses'));
    }

    /**
     * Update Teacher
     */
    public function update(TeacherStoreRequest $request, Teacher $teacher)
    {
        $update = $request->validated();

        if ($update) {
            Session::flash('success', 'The Teacher has been updated succesfully');

            $teacher->update($update);
        } else {
            Session::flash('failure', 'There is a problem in updating the student');
        }

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
