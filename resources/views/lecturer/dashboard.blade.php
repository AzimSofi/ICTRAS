@include('layouts.app')

@extends('lecturer.layout')

@section('title')
    ICTRAS | Student Management
@endsection

@section('content')
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
                                        <i class="fas fa-light fa-file fa-lg icon-hover" title="Course outline by student">
                                        </i>
                                    </a>
                                @else
                                    <i class="fas fa-light fa-file fa-lg icon-hover" title="No course outline available">
                                    </i>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="action-field text-center">
                        @if (is_null($application->recommendation))
                            <!-- Approve Button Form -->
                            <form action="{{ route('lecturer.student-application.recommend', $application->id) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit"
                                    class="btn btn-success btn-sm btn-approve-disapprove">Recommend</button>
                            </form>

                            <!-- Disapprove Button Form -->
                            <form action="{{ route('lecturer.student-application.not-recommend', $application->id) }}"
                                method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm btn-approve-disapprove">Not
                                    recommend</button>
                            </form>
                        @else
                            @if ($application->recommendation)
                                <div class="aligh-self-center">
                                    Recommended
                                </div>
                            @else
                                <div class="aligh-self-center">
                                    Not Recommended
                                </div>
                            @endif
                        @endif
                    </td>
                </tr>
                @include('hod.student-application.course-description', [
                    'application' => $application,
                ])
            @endforeach
        </tbody>
    </table>
@endsection
