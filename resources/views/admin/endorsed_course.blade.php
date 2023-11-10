<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTRAS | Admin</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @include('layouts.app')

<body>
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-lg-3">
                @include("admin.sidebar")
            </div>
            <div class="col-lg-9">
                <div class="row mb-4">
                    <div class="col">
                        <form action="{{ route('endorsed_course.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search for courses..." value="{{ request('search') }}">
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
            </div>
        </div>
    </div>
</body>
