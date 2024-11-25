@extends('layouts.app')

@section('title', 'Create Course')

@section('content')
    <h1>Create a New Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Course Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
