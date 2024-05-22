@include('layouts.app')

@extends('hod.layout')

@section('title')
    ICTRAS | Student Management
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <form action="{{ 'hod.student-application.index' }}" method="GET">
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
                <th scope="col">Student</th>
                <th scope="col">Course Code</th>
                <th scope="col">Course Title</th>
                <th scope="col" class="text-center">Credit Hours</th>
                <th scope="col" class="text-center">Grade Obtained</th>
                <th scope="col">IIUM Course Code</th>
                <th scope="col">IIUM Course Name</th>
                <th scope="col" class="text-center" style="width: 5%">Documents</th>
                {{-- <th scope="col">Department</th> --}}
                <th scope="col" class="action-field text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $application->user }}</td>
                    <td>{{ $application->course_code }}</td>
                    <td>{{ $application->course_name }}</td>
                    <td class="text-center">{{ $application->credit_hours }}</td>
                    <td class="text-center">{{ $application->grade_obtained }}</td>
                    <td>{{ $application->endorsed_course_code }}</td>
                    <td>{{ $application->endorsed_course_name }}</td>
                    <td> {{-- Documents --}}
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="align-self-center me-3">
                                <i class="fas fa-light fa-circle-info fa-lg icon-hover"
                                    title="Description of course by student" data-bs-toggle="modal"
                                    data-bs-target="#courseDescriptionModal{{ $application->id }}">
                                </i>
                            </div>
                            <div class="align-self-center">
                                @if ($application->pdf_content)
                                    <a href="{{ route('courseOutline.show', ['application' => $application->id]) }}"
                                        target="_blank">
                                        <i class="fas fa-light fa-file fa-lg icon-hover"
                                            title="Course outline by student">
                                        </i>
                                    </a>
                                @else
                                    <i class="fas fa-light fa-file fa-lg icon-hover"
                                        title="No course outline available">
                                    </i>
                                @endif
                            </div>
                        </div>
                    </td>
                    {{-- <td>{{ $application->department->name }}</td> --}}
                    <td class="action-field text-center">
                        <!-- Approve Button Form -->
                        <form action="{{ route('admin.student-application.approve', $application->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm btn-approve-disapprove">Approve</button>
                        </form>

                        <!-- Disapprove Button Form -->
                        <form action="{{ route('admin.student-application.disapprove', $application->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm btn-approve-disapprove">Disapprove</button>
                        </form>
                    </td>
                </tr>
                @include('hod.student-application.course-description', ['application' => $application])
            @endforeach
        </tbody>
    </table>
@endsection

<style>
    .btn-approve-disapprove {
        width: 80px;
        height: 30px;
    }

    .action-field {
        width: 180px;
    }
</style>
