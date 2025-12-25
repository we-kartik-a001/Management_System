<?php

namespace App\Http\Controllers;

// Models 
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Course;

// Request 
use Illuminate\Http\Request;
use App\Http\Requests\TeacherStoreRequest;

// Repository
use App\Repositories\CourseRepository;

//Session
use Illuminate\Support\Facades\Session;

// Mail
use App\Mail\SchoolInfo;
use Illuminate\Support\Facades\Mail;

class TeachersController extends Controller
{
    /**
     * Display the number of teachers 
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            Session::put('teacher_search', $request->input('search'));
        } elseif ($request->has('reset')) {
            Session::forget('teacher_search');
        }

        $search = Session::get('teacher_search');

        $teachers = Teacher::with('courses', 'creator')->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        if (!$search) {
            Session::flash('success', 'Students details are fetched successfully');
        }

        return view('teacher.index.teacherIndex', compact('teachers'));
    }

    /**
     * create teacher 
     */
    public function create()
    {
        $courses = Course::with('subjects')->get();

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
            Mail::to($teacher->email)->queue(new SchoolInfo($teacher));

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

        $subjects = Subject::pluck('name', 'id');

        return view('teacher.edit.teacherEdit', compact('teacher', 'courses', 'subjects'));
    }

    /**
     * Update Teacher
     */
    public function update(TeacherStoreRequest $request, Teacher $teacher)
    {
        $update = $request->validated();

        $subjects = $update['subject_id']; // Array of subject IDs

        unset($update['subject_id']); // Remove subject_id from input

        if ($update) {
            Session::flash('success', 'The Teacher has been updated succesfully');

            $teacher->update($update);

            $teacher->subjects()->detach();

            $teacher->subjects()->attach($subjects);
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

    public function multidelete(Request $request)
    {
        $ids = $request->ids;

        if (!is_array($ids) || empty($ids)) {
            return response()->json(['error' => 'No IDs provided.'], 400);
        }

        Teacher::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Selected teachers deleted successfully!']);
    }

    public function status(Teacher $id)
    {
        $teacher = $id;
        if($teacher)
        {
            if($teacher->status)
            {
                $teacher->status = 0;
            }else
            {
                $teacher->status =1;
            }
            $teacher->save();
        }

        return back();
    }
}
