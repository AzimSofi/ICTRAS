@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | User Assignments
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('user_assignment.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for user..."
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
                <th scope="col">Matri no</th>
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
                    <td>{{ $user->department?->department_name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
