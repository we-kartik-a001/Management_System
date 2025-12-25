<?php

namespace App\Http\Controllers;

// Request 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{

    /**
     * Show the session data 
     */
    public function index()
    {
        // $data = $request->session()->get('name');
        $data = ([
            'name' => session('name'),
            'age' => session('age'),
            'student_teacher_name' => session('student_teacher_name'),
        ]);

        if (isset($data)) {
            Session::flash('success', 'Data Stored in sesssion successfully ');
            
            return view('Session.index.sessionIndex', compact('data'));
        }else{
            Session::flash('failure', 'Data not stored in session successfully.');

            return view('Session.index.sessionIndex', compact('data'));
        }
    }

    /**
     * Create page of Session directory 
     */
    public function createSession()
    {
        return view('Session.create.sessionCreate');
    }

    /**
     * Store the data in the sesssion 
     */
    public function storeInSession(Request $request)
    {
        $request->session()->put('name', $request->name);
        $request->session()->put('age', $request->age);
        $request->session()->put('student_teacher_name', $request->student_teacher_name);

        return redirect(route('session.index'));
    }

    /**
     * Delete the data from the session
     */
    public function deleteFromSession()
    {
        // Session::forget('name','age','student_teacher_name'); ---- This method wont work beacuse it delete only one item at a time
        Session::forget(['name', 'age', 'student_teacher_name']);  // This method will delete the multiple item from the session 

        return redirect(route('session.index'));
    }
}
