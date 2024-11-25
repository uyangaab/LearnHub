<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function index()
    {
        return view('student.dashboard');
    }

    public function viewCourses()
    {
        $courses = Course::all();

        return view('student.view_courses', compact('courses'));
    }
}
