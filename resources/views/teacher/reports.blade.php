@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <h1>Reports for Your Courses</h1>

    @foreach($courses as $course)
        <h2>{{ $course->title }}</h2>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Score</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->results as $result)
                    <tr>
                        <td>{{ $result->student->name }}</td>
                        <td>{{ $result->score }}</td>
                        <td>{{ $result->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection
