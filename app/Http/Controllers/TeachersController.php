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
    public function index()
    {
        $teachers = Teacher::with('courses', 'creator')->paginate(10);

        return view('teacher.index.teacherIndex', compact('teachers'));
    }

    /**
     * create teacher 
     */
    public function create()
    {
        $courses = Course::with('subjects')->paginate(10);

        $subjects =  Subject::pluck('name', 'id');

        return (view('teacher.create.teacherCreate', compact('courses')));
    }

    /*
     * Store teacher 
     */
    public function store(TeacherStoreRequest $request)
    {
        $input = $request->validated();

        $subjects = $input['subject_id']; // Array of subject IDs

        unset($input['subject_id']); // Remove subject_id from input

        if ($input) {
            $teacher = Teacher::create($input); // Create the teacher

            // Attach the selected subjects to the teacher
            $teacher->subjects()->attach($subjects);

            // Send email
            Mail::to($teacher->email)->send(new SchoolInfo($teacher));

            Session::flash('success', 'The Teacher created successfully');
        } else {
            Session::flash('failure', 'The Teacher was not created successfully');
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
