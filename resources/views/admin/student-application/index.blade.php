@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | Student Management
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <form action="{{ '#' }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for application..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Course Code</th>
                <th scope="col">Course Title</th>
                <th scope="col" class="text-center">Credit Hours</th>
                <th scope="col" class="text-center">Grade Obtained</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $application->course_code }}</td>
                    <td>{{ $application->course_name }}</td>
                    <td class="text-center">{{ $application->credit_hours }}</td>
                    <td class="text-center">{{ $application->grade_obtained }}</td>
                    <td class="text-center">
                        <!-- Approve Button Form -->
                        <form action="{{ route('admin.student-application.approve', $application->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <!-- Disapprove Button Form -->
                        <form action="{{ route('admin.student-application.disapprove', $application->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Disapprove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
