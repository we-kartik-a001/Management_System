<?php

namespace App\Http\Controllers;

//Request
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;

class StudentsController extends Controller
{   
    public function showForm()
    {
        return(view('student'));
    }

    public function store(StudentRequest $request)
    {
        $input = $request->validated();

        if($input)
        {
            Student::create($input);

            return view('verify');
        }
        
    }
}
