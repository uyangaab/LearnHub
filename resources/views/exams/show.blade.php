@extends('layouts.app')

@section('title', 'Exam Details')

@section('content')
    <h1>{{ $exam->title }}</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Course</h5>
            <p class="card-text">{{ $exam->course->title }}</p>

            <h5 class="card-title mt-3">Date & Time</h5>
            <p class="card-text">{{ $exam->date_time->format('F j, Y, g:i A') }}</p>

            <h5 class="card-title mt-3">Created By</h5>
            <p class="card-text">{{ $exam->teacher->name }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this exam?')">Delete</button>
        </form>
        <a href="{{ route('exams.index') }}" class="btn btn-secondary">Back to Exams</a>
    </div>
@endsection
