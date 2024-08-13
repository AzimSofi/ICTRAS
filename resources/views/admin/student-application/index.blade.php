@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | Student Management
@endsection

@section('content')
    <div class="row mb-0">
        <div class="col">
            {{-- <form action="{{ 'admin.student-application.index' }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for application..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form> --}}
        </div>
        <div class="row my-4 m-1">
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#superUserModal">
                Super user
            </button>
        </div>
    </div>

    <!-- Super User Modal -->
    <div class="modal fade" id="superUserModal" tabindex="-1" aria-labelledby="superUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="superUserModalLabel">Enter Super User Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="superUserForm">
                        <div class="mb-3">
                            <label for="superUserPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="superUserPassword" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="superUserSubmit">Submit</button>
                        <button type="button" class="btn btn-danger" id="revokeAccessButton">Revoke
                            Access</button>
                        {{-- @if ($superuser && $superuser->status)
                            <button type="button" class="btn btn-danger" id="revokeAccessButton">Revoke
                                Access</button>
                        @else
                            <button type="button" class="btn btn-danger" id="revokeAccessButton" disabled>Revoke
                                Access</button>
                        @endif --}}

                    </form>
                </div>
            </div>
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
                <th scope="col">
                    <a href="{{ route('admin.student-application.index', ['sort' => $nextSortOrder]) }}">Status</a>
                </th>
                <th scope="col" class="text-center" style="width: 5%">Documents</th>
                <th scope="col">Department</th>
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
                    <td>
                        @if (is_null($application?->status))
                            <div style="color: #0D6EFD">
                                PROCESSING REQUEST
                            </div>
                        @elseif($application?->status)
                            <div style="color: #198754">
                                APPROVED
                            </div>
                        @else
                            <div style="color: #DC3545">
                                DISAPPROVED
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="align-self-center me-3">
                                <i class="fas fa-light fa-circle-info fa-lg icon-hover"
                                    title="Description of course by student" data-bs-toggle="modal"
                                    data-bs-target="#courseDescriptionModal{{ $application->id }}"></i>
                            </div>
                            <div class="align-self-center">
                                @if ($application->pdf_content)
                                    <a href="{{ route('courseOutline.show', ['application' => $application->id]) }}"
                                        target="_blank">
                                        <i class="fas  fa-light fa-file fa-lg icon-hover"
                                            title="Course outline by student"></i>
                                    </a>
                                @else
                                    <i class="fas fa-light fa-file fa-lg icon-hover"
                                        title="No course outline available"></i>
                                @endif
                            </div>
                        </div>
                    </td>
                    {{-- <td>{{ $application->department->name }}</td> --}}
                    <td>
                        <form id="department-form-{{ $application->id }}"
                            action="{{ route('admin.student-application.update', $application) }}" method="POST"
                            data-confirm>
                            @csrf
                            @method('POST')
                            <select id="department{{ $application->id }}" name="department_id" class="form-select">
                                <option value="" {{ is_null($application->department_id) ? 'selected' : '' }}>None
                                </option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ $application->department_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($superuser && $superuser->status)
                                <button type="submit" class="btn btn-primary mt-2 save-button" style="display: none;">Save
                                    Changes</button>
                            @else
                                <button type="submit" class="btn btn-primary mt-2 save-button" style="display: none;"
                                    disabled>Save
                                    Changes</button>
                            @endif
                        </form>
                    </td>

                </tr>
                @include('admin.student-application.course-description')
                @include('admin.student-application.edit')
            @endforeach
        </tbody>
    </table>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const revokeAccessButton = document.getElementById('revokeAccessButton');

        document.getElementById('superUserSubmit').addEventListener('click', function() {
            const password = document.getElementById('superUserPassword').value;

            fetch('{{ route('validate-super-user-password') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        password: password
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelectorAll('.save-button').forEach(button => {
                            button.disabled = false;
                        });
                        // Hide the modal
                        // $('#superUserModal').modal('hide');
                        alert('Access granted.');
                        // Refresh the page
                        // window.location.reload();
                    } else {
                        alert('Incorrect password, please try again.');
                    }
                })
                .catch(error => {
                    alert('There was an error processing your request.');
                });
        });

        revokeAccessButton.addEventListener('click', function() {
            fetch('{{ route('revoke-super-user-access') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Access revoked.');
                        // Refresh the page
                        window.location.reload();
                    } else {
                        alert('Failed to revoke access.');
                    }
                })
                .catch(error => {
                    alert('There was an error processing your request.');
                });
        });
    });
</script>

<style>
    .btn-approve-disapprove {
        width: 80px;
        height: 30px;
    }

    .action-field {
        width: 180px;
    }
</style>
