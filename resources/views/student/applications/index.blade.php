@include('layouts.app')

@extends('student.layout')

@section('title')
    ICTRAS | Applications
@endsection

@section('content')
    <div class="alert alert-warning alert text-center">

        <strong> CRITERIA FOR TRANSFER OF CREDIT
            <br />Please read carefully the following criteria of transfer of credit:-</strong>
        <br />1. The institutions/colleges must be recognized by
        the Malaysian Government and IIUM.
        <br />2. Credit/Contact hours/Semester are based on 14
        lecture weeks.
        <br />3. Minimum grade for credit transfer for diploma
        holders shall be ‘B’ grade or its equivalent and a
        good pass.
        <br /> 4. Comparability in terms of depth and content.
        <br />5. Maximum credits for transfer is 30% of the total
        graduation requirements of the programme.
        <br /> 6. Courses taken within 5 years prior to admission to
        IIUM/other maximum validity period accepted by
        Kulliyyah
        <br>
        <br>
        <strong> This application form will ONLY be processed subject to submission of the following documents:</strong>
        <br />1. Transcript/result slips (showing course title and
        grade); and
        <br /> 2. Course outline/syllabus/description/curricular; or
        <br />3. University/Institutional prospectus or catalogue
        <br>
        <br><strong> Please make sure to print and submit the printed form at AMAD.</strong>

    </div>
    <div class="card text-center mb-4">
        <div class="card-header">
            INFORMATION ON PREVIOUS INSTITUTION
        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">Special title treatment</h5> --}}
            <p class="card-text">Name of Institution: {{ $user->previousInstitution->name ?? '' }}</p>
            @if ($user->previousInstitution->degree_status ?? true)
                <p class="card-text">Name of Degree:
                @else
                <p class="card-text">Name of Diploma:
            @endif
            {{ $user->previousInstitution->degree_or_diploma_name ?? '' }}</p>
            <p class="card-text">Year of study: {{ $user->previousInstitution->year_of_study ?? '' }}</p>
            <p class="card-text">Reason of leaving: {{ $user->previousInstitution->reason_of_leaving ?? '' }}</p>
            <p class="card-text">CGPA: {{ $user->previousInstitution->cgpa ?? '' }}</p>
            @if ($user->previousInstitution)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editPreviousInstitutionModal">
                    Edit information
                </button>
            @else
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#previousInstitutionModal">
                    Add information
                </button>
            @endif
        </div>
        {{-- <div class="card-footer text-muted">
            2 days ago
        </div> --}}
    </div>
    <hr>
    <div class="row my-4 m-1">
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#applicationModal">
            Add course
        </button>
    </div>
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('applications.index') }}" method="GET">
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
                <th scope="col">Course code</th>
                <th scope="col">Course name</th>
                <th scope="col">Credit hours</th>
                <th scope="col">Grade Obtained</th>
                {{-- <th scope="col">Status</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $application?->course_code }}</td>
                    <td>{{ $application?->course_name }}</td>
                    <td>{{ $application?->credit_hours }}</td>
                    <td>{{ $application?->grade_obtained }}</td>
                    {{-- <td>{{ $application?->status ? 'APPROVED' : 'DISAPPROVED' }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('student.applications.previous_institution.create')
    @include('student.applications.previous_institution.edit')
    @include('student.applications.create')
@endsection
