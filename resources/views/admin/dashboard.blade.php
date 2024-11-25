@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <ul>
        <li><a href="{{ route('admin.users.manage') }}">Manage Users</a></li>
        <li><a href="{{ route('reports.index') }}">View Reports</a></li>
    </ul>
@endsection
