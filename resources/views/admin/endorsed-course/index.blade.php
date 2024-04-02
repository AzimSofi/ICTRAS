@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | Endorsed Course
@endsection

@section('content')
    <div class="row my-4 m-1">
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#endorseCourseModal">
            Endorse a course
        </button>
    </div>
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
                <th scope="col">Course code</th>
                <th scope="col">Course name</th>
                <th scope="col">Endorsed course code</th>
                <th scope="col">Endorsed course name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($endorsed_courses as $endorsed_course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $endorsed_course->university }}</td>
                    <td>{{ $endorsed_course->department->name }}</td>
                    <td>{{ $endorsed_course->course_code }}</td>
                    <td>{{ $endorsed_course->course_name }}</td>
                    <td>{{ $endorsed_course->endorsed_course_code }}</td>
                    <td>{{ $endorsed_course->endorsed_course_name }}</td>
                    <td>{{ $endorsed_course->status ? 'APPROVED' : 'DISAPPROVED' }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <div class="align-self-center">
                                <a href="{{ route('student.print.fromAdmin', $user) }}">
                                    <i class="fas fa-light fa-print fa-lg icon-hover"></i>
                                </a>
                            </div>
                            <div class="align-self-center">
                                <i class="edit-toggle fas fa-light fa-pen-to-square fa-lg icon-hover"
                                    data-bs-toggle="collapse" data-bs-target="#editUser{{ $user->id }}"
                                    data-user-id="{{ $user->id }}">
                                </i>
                            </div> --}}
                            <div class="align-self-center">
                                <i class="destroyItem fas fa-light fa-trash fa-lg icon-hover"
                                    data-bs-route="{{ route('endorsed_courses.destroy', $endorsed_course) }}"
                                    data-bs-object={{ $endorsed_course }}>
                                </i>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('admin.endorsed-course.create')
    @include('admin.endorsed-course.destroy')
@endsection
