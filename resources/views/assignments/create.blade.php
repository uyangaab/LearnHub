@extends('layouts.app')

@section('title', 'Create Assignment')

@section('content')
    <h1>Create a New Assignment</h1>
    <form action="{{ route('assignments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Assignment Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" id="due_date" name="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
