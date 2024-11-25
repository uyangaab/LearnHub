@extends('layouts.app')

@section('title', 'View Courses')

@section('content')
    <h1>Available Courses</h1>

    <div>
        @foreach($courses as $course)
            <div class="course">
                <h2>{{ $course->title }}</h2>
                <p>{{ $course->description }}</p>
                @php
                    $result = $results->where('course_id', $course->id)->first();
                @endphp

                @if($result)
                    <p>Score: {{ $result->score }}</p>
                    <p>Status: {{ $result->status }}</p>
                @else
                    <p>No results yet.</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection
