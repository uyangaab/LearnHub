@extends('layouts.app')

@section('content')
    <h1>Your Courses</h1>

    <a href="{{ route('teacher.create-course') }}" class="btn btn-primary">Create New Course</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->start_date }}</td>
                    <td>{{ $course->end_date }}</td>
                    <td>
                        <a href="{{ route('teacher.edit-course', $course->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('teacher.destroy-course', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
