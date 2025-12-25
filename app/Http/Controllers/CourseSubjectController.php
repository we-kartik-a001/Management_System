<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseSubjectController extends Controller
{
    public function index()
    {
        $courses = Course::with('subjects')->paginate(10);

        return view('courses_subjects.courses_subjects', compact('courses'));
    }
}
