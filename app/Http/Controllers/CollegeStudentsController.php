<?php

namespace App\Http\Controllers;

//Models
use App\Models\CollegeStudent;

//Request
use Illuminate\Http\Request;
use App\Http\Requests\CollegeStudentRequest;

//Repository
use App\Repositories\CourseRepository;
use App\Repositories\TeacherRepository;

// Session
use Illuminate\Support\Facades\Session;

class CollegeStudentsController extends Controller
{
    /**
     * Show students 
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            Session::put('student_search', $request->input('search'));
        } elseif ($request->has('reset')) {
            Session::forget('student_search');
        }
    
        $search = Session::get('student_search');
    
        $students = CollegeStudent::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);
    

        if ($students) {
            return (view('student.index.studentIndex', compact('students')));
        } else {
            Session::flash('failure', 'There is some problem in fetching student data');

            return redirect(route('main.welcome'));
        }
    }

    /**
     * Create Student
     */
    public function create()
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        $teachers = (new TeacherRepository)->pluckTeachersByNameAndId();

        if ($courses && $teachers) {
            return (view('student.create.studentCreate', compact('courses', 'teachers')));
        } else {
            Session::flash('failure', 'There is some problem in creating student');

            return redirect(route('student.index'));
        }
    }

    /**
     *  Store student
     */
    public function store(CollegeStudentRequest $request)
    {
        $inputs = $request->validated();

        $teachers = $inputs['teachers_id'];

        unset($inputs['teachers_id']);

        if ($inputs) {
            Session::flash('success', 'The student created succesfully');

            $student = CollegeStudent::create($inputs);

            $student->teachers()->attach($teachers);

            return redirect(route('student.index'));
        } else {
            Session::flash('failure', 'There is a problem in creating the student');

            return redirect(route('student.create'));
        }
    }

    public function edit(CollegeStudent $student)
    {
        $courses = (new CourseRepository)->pluckCoursesByNameAndId();

        $teachers = (new TeacherRepository)->pluckTeachersByNameAndId();

        if ($courses && $teachers) {
            return (view('student.edit.StudentEdit', compact('student', 'courses', 'teachers')));
        } else {
            Session::flash('failure', 'There is some problem in creating student');

            return redirect(route('student.index'));
        }
    }

    public function update(CollegeStudentRequest $request, CollegeStudent $student)
    {
        $updates = $request->validated();

        $teachers = $updates['teachers_id'];

        unset($updates['teachers_id']);

        if ($updates && $teachers) {

            Session::flash('success','Student has been updated successfully');

            $student->update($updates);

            $student->teachers()->detach();

            $student->teachers()->attach($teachers);

        }else{
             Session::flash('success','Error in updating the student');
        }

        return redirect(route('student.edit', $student->id));
    }

    /**
     * Delete teacher
     */
    public function delete(CollegeStudent $student)
    {        
        $student->delete();

        return redirect(route('student.index'));
    }

    /**
     * Detach the teacher from student
     */
    public function detachTeacher(CollegeStudent $student)
    {
        $student->teachers()->detach();

        return back()->with('success', 'All teachers detached from student.');
    }

    /**
     * Delete the course of the student
     */
    public function deleteCourse(CollegeStudent $student)
    {
        $student->courses_id = null;  // Unlink the course
        $student->save();

        return back()->with('success', 'Course Deleted from the student.');
    }

    public function multidelete(Request $request)
    {
        $ids = $request->ids;

        if (!is_array($ids) || empty($ids)) {
            return response()->json(['error' => 'No IDs provided.'], 400);
        }

        CollegeStudent::whereIn('id', $ids)->delete();

        return response()->json(['success' => true, 'message' => 'Selected students deleted successfully!']);
    }

    public function status(CollegeStudent $id)
    {
        $collegeStudent = $id;

        if($collegeStudent)
        {
            if($collegeStudent->status)
            {
                $collegeStudent->status=0;
            }else{
                $collegeStudent->status=1;
            }

            $collegeStudent->save();
        }

        return back(); 
    }
}
