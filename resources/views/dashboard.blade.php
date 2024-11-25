@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
    <h1>Teacher Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <ul>
        <li><a href="{{ route('courses.index') }}">Manage Courses</a></li>
        <li><a href="{{ route('assignments.index') }}">Manage Assignments</a></li>
        <li><a href="{{ route('exams.index') }}">Manage Exams</a></li>
        <li><a href="{{ route('teacher.reports') }}">View Reports</a></li>
    </ul>
@endsection
