@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | Endorsed Course
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('endorsed_courses.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for courses..."
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
                <th scope="col">University</th>
                <th scope="col">Department</th>
                <th scope="col">Course name</th>
                <th scope="col">Endorsed course name</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($endorsed_courses as $endorsed_course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $endorsed_course->university }}</td>
                    <td>{{ $endorsed_course->department->department_name }}</td>
                    <td>{{ $endorsed_course->course_name }}</td>
                    <td>{{ $endorsed_course->endorsed_course_name }}</td>
                    <td>{{ $endorsed_course->status ? 'APPROVED' : 'DISAPPROVED' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
