@extends('layouts.app')

@section('title', 'Exams')

@section('content')
    <h1>Exams</h1>
    <a href="{{ route('exams.create') }}" class="btn btn-primary">Create New Exam</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Scheduled Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $exam->title }}</td>
                    <td>{{ $exam->scheduled_date }}</td>
                    <td>
                        <a href="{{ route('exams.show', $exam->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('exams.edit', $exam->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('exams.destroy', $exam->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
