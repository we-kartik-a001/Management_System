<?php

namespace App\Http\Controllers;

//Models
use App\Models\CollegeStudent;

//Request
use App\Http\Requests\CollegeStudentRequest;
use App\Models\Teacher;
//Repository
use App\Repositories\CourseRepository;
use App\Repositories\TeacherRepository;

// Session
use Illuminate\Support\Facades\Session;

class CollegeStudentsController extends Controller
{
    public function index()
    {
        $students = CollegeStudent::with('teachers', 'course')->paginate(10);

        return (view('student.index.studentIndex', compact('students')));
    }

    // Create student
    public function create()
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        $teachers = (new TeacherRepository)->pluckTeachersByNameAndId();

        if ($courses && $teachers) {
            return (view('student.create.studentCreate', compact('courses', 'teachers')));
        } else {
            Session::flash('failure', 'There is some problem in crea');

            return redirect(route('student.index'));
        }
    }

    public function store(CollegeStudentRequest $request)
    {
        $inputs = $request->validated();

        $teachers = $inputs['teachers_id'];

        unset($inputs['teachers_id']);

        if ($inputs) {

            Session::flash('success', 'The student created succesfully');

            $student = CollegeStudent::create($inputs);

            $student->teachers()->attach($teachers);

            // $student->teachers()->detach($teachers);

            return redirect(route('student.index'));
        } else {
            Session::flash('failure', 'The student not create due to error');

            return redirect(route('student.create'));
        }
    }
    public function detachTeacher(CollegeStudent $student, Teacher $teacher)
    {
        $student->teachers()->detach($teacher->id);

        return redirect()->back()->with('success', 'Teacher detached successfully.');
    }
}
