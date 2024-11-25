<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('teacher');
    }

    public function index()
    {
        return view('teacher.dashboard');
    }


    public function manageCourses()
    {
        $courses = auth()->user()->courses;
        return view('teacher.manage_courses', compact('courses'));
    }


    public function createCourse()
    {
        return view('teacher.create_course');
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->teacher_id = auth()->id();
        $course->save();

        return redirect()->route('teacher.manage-courses')->with('success', 'Course created successfully.');
    }

    public function editCourse(Course $course)
    {

        if ($course->teacher_id !== auth()->id()) {
            return redirect()->route('teacher.manage-courses')->with('error', 'You are not authorized to edit this course.');
        }

        return view('teacher.edit_course', compact('course'));
    }

    public function updateCourse(Request $request, Course $course)
    {

        if ($course->teacher_id !== auth()->id()) {
            return redirect()->route('teacher.manage-courses')->with('error', 'You are not authorized to update this course.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $course->update($request->only('title', 'description', 'start_date', 'end_date'));

        return redirect()->route('teacher.manage-courses')->with('success', 'Course updated successfully.');
    }


    public function destroyCourse(Course $course)
    {
        if ($course->teacher_id !== auth()->id()) {
            return redirect()->route('teacher.manage-courses')->with('error', 'You are not authorized to delete this course.');
        }

        $course->delete();

        return redirect()->route('teacher.manage-courses')->with('success', 'Course deleted successfully.');
    }
}
