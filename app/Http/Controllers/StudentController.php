<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Load students with ajax
     */
    public function index(Request $request)
    {   
        $students = Student::paginate(5);

        if ($request->ajax()) {

			$html = view('list', compact('students'))->render();
  
            return response()->json($html);
		}
        
        return view('student', compact('students'));
    }
}