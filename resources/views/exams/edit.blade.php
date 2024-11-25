@extends('layouts.app')

@section('title', 'Edit Exam')

@section('content')
    <h1>Edit Exam</h1>

    <form action="{{ route('exams.update', $exam->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Exam Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $exam->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == old('course_id', $exam->course_id) ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date_time" class="form-label">Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control" value="{{ old('date_time', $exam->date_time->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Exam</button>
        <a href="{{ route('exams.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
