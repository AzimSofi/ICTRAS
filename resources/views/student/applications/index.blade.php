@include('layouts.app')

@extends('student.layout')

@section('title')
    ICTRAS | Applications
@endsection

@section('content')
    <!-- Tab navigation -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button"
                role="tab" aria-controls="info" aria-selected="true">Information</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="applications-tab" data-bs-toggle="tab" data-bs-target="#applications"
                type="button" role="tab" aria-controls="applications" aria-selected="false">Applications</button>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="myTabContent">
        <!-- Information Tab Pane -->
        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
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
                <strong> This application form will ONLY be processed subject to submission of the following
                    documents:</strong>
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
        </div>

        <!-- Applications Tab Pane -->
        <div class="tab-pane fade" id="applications" role="tabpanel" aria-labelledby="applications-tab">
            <div class="row my-4 m-1">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                    data-bs-target="#applicationModal">
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
                        <th scope="col">Grade Obtained</th>
                        <th scope="col">IIUM Course code</th>
                        <th scope="col">IIUM Course name</th>
                        <th scope="col">Credit hours</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="width: 7%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $application?->course_code }}</td>
                            <td>{{ $application?->course_name }}</td>
                            <td>{{ $application?->grade_obtained }}</td>
                            <td>{{ $application?->endorsed_course_code }}</td>
                            <td>{{ $application?->endorsed_course_name }}</td>
                            <td>{{ $application?->credit_hours }}</td>
                            <td>
                                @if (is_null($application?->status))
                                    PROCESSING REQUEST
                                @elseif($application?->status)
                                    APPROVED
                                @else
                                    DISAPPROVED
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="align-self-center">
                                        <i class="edit-toggle fas fa-light fa-pen-to-square fa-lg icon-hover"
                                            data-bs-toggle="collapse" data-bs-target="#editCourse{{ $application->id }}"
                                            data-user-id="{{ $application->id }}">
                                        </i>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="destroyItem fas fa-light fa-trash fa-lg icon-hover"
                                            data-bs-route="{{ route('applications.destroy', $application) }}"
                                            data-bs-object={{ $application }}>
                                        </i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <div class="collapse edit-form" id="editCourse{{ $application->id }}">
                                    @include('student.applications.edit')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('student.applications.previous_institution.create')
    @include('student.applications.previous_institution.edit')
    @include('student.applications.create')
    @include('student.applications.destroy')
@endsection

@if (session('success'))
    {{-- <div class="alert alert-success">
    {{ session('success') }}
</div> --}}
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var activeTab = @json(session('activeTab'));
        if (activeTab) {
            let tabEl = document.querySelector('button[data-bs-target="#' + activeTab + '"]');
            if (tabEl) {
                // Instead of directly showing the tab, simulate a click on the tab.
                // This should ensure both the tab is activated and its content is displayed.
                tabEl.click();
            }
        }
    });
</script>
