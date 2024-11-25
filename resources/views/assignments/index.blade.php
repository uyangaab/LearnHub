@extends('layouts.app')

@section('title', 'Assignments')

@section('content')
    <h1>Assignments</h1>
    <a href="{{ route('assignments.create') }}" class="btn btn-primary">Create New Assignment</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->title }}</td>
                    <td>{{ $assignment->due_date }}</td>
                    <td>
                        <a href="{{ route('assignments.show', $assignment->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" style="display: inline;">
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
