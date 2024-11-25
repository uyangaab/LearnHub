@extends('layouts.app')

@section('title', 'Edit Assignment')

@section('content')
    <h1>Edit Assignment</h1>
    <form action="{{ route('assignments.update', $assignment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $assignment->title) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description', $assignment->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="datetime-local" id="due_date" name="due_date" class="form-control"
                value="{{ old('due_date', $assignment->due_date->format('Y-m-d\TH:i')) }}" required>
        </div>
        <div class="form-group">
            <label for="course_id">Course:</label>
            <select id="course_id" name="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $assignment->course_id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update Assignment</button>
        <a href="{{ route('assignments.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
@endsection
