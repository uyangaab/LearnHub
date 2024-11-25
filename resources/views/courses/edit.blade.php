@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
    <h1>Edit Course</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Course Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $course->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required>{{ $course->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
@endsection
