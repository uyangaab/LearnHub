@extends('layouts.app')

@section('title', 'Assignment Details')

@section('content')
    <h1>{{ $assignment->title }}</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $assignment->description }}</p>

            <h5 class="card-title mt-3">Course</h5>
            <p class="card-text">{{ $assignment->course->title }}</p>

            <h5 class="card-title mt-3">Due Date</h5>
            <p class="card-text">{{ $assignment->due_date->format('F j, Y, g:i A') }}</p>

            <h5 class="card-title mt-3">Created By</h5>
            <p class="card-text">{{ $assignment->teacher->name }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assignment?')">Delete</button>
        </form>
        <a href="{{ route('assignments.index') }}" class="btn btn-secondary">Back to Assignments</a>
    </div>
@endsection
