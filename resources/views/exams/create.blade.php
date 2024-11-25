@extends('layouts.app')

@section('title', 'Create Exam')

@section('content')
    <h1>Create a New Exam</h1>
    <form action="{{ route('exams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Exam Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="scheduled_date">Scheduled Date:</label>
            <input type="datetime-local" id="scheduled_date" name="scheduled_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
