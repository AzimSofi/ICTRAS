@include('layouts.app')

@extends('admin.layout')

@section('title')
    ICTRAS | Userlog
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('userlogs.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for userlog..."
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
                <th scope="col">User ID</th>
                <th scope="col">IP Address</th>
                <th scope="col">Login at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userlogs as $userlog)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $userlog->user_id }}</td>
                    <td>{{ $userlog->ip_address }}</td>
                    <td>{{ (new DateTime($userlog->login_at))->format('d/m/Y (g:iA)') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
