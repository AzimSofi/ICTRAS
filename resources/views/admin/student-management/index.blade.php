@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | Student Management
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('student_management.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for student..."
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
                <th scope="col">Name</th>
                <th scope="col">Matric no</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Phone number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->matric_no }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->department?->name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="align-self-center">
                                <i class="fas fa-light fa-list fa-lg icon-hover"></i>
                            </div>
                            <div class="align-self-center">
                                <i class="edit-toggle fas fa-light fa-pen-to-square fa-lg icon-hover"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#editUser{{ $user->id }}"
                                    data-user-id="{{ $user->id }}">
                                </i>
                            </div>
                            <div class="align-self-center">
                                <i class="destroyItem fas fa-light fa-trash fa-lg icon-hover"
                                    data-bs-route="{{ route('users.destroy', $user) }}"
                                    data-bs-object={{ $user }}>
                                </i>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="collapse edit-form" id="editUser{{ $user->id }}">
                            @include('admin.student-management.edit')
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('admin.student-management.destroy')
@endsection
