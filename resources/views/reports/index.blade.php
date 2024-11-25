@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <h1>Reports</h1>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->student_name }}</td>
                    <td>{{ $report->course_title }}</td>
                    <td>{{ $report->grade }}</td>
                    <td>
                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
