@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <h1>Student Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <ul>
        <li><a href="{{ route('student.courses') }}">View Courses</a></li>
        <li><a href="{{ route('student.assignments') }}">View Assignments</a></li>
        <li><a href="{{ route('student.exams') }}">View Exams</a></li>
        <li><a href="{{ route('student.results') }}">View Results</a></li>
    </ul>
@endsection
