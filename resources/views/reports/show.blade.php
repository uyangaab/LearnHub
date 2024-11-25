@extends('layouts.app')

@section('title', 'Report Details')

@section('content')
    <h1>Report Details</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Student</h5>
            <p class="card-text">{{ $report->student->name }}</p>

            <h5 class="card-title mt-3">Course</h5>
            <p class="card-text">{{ $report->course->title }}</p>

            <h5 class="card-title mt-3">Assignment</h5>
            <p class="card-text">{{ $report->assignment->title ?? 'N/A' }}</p>

            <h5 class="card-title mt-3">Exam</h5>
            <p class="card-text">{{ $report->exam->title ?? 'N/A' }}</p>

            <h5 class="card-title mt-3">Grade</h5>
            <p class="card-text">{{ $report->grade ?? 'Not Graded' }}</p>

            <h5 class="card-title mt-3">Comments</h5>
            <p class="card-text">{{ $report->comments ?? 'No Comments' }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back to Reports</a>
    </div>
@endsection
