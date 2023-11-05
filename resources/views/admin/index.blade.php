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
                <div class="sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="bi bi-house-door-fill"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="userlog.php">
                                <i class="bi bi-journal-bookmark-fill"></i> Userlog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="History.php">
                                <i class="bi bi-clock-history"></i> History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="userlog.php">
                                <i class="bi bi-journal-check"></i> User Assigments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ecourse.php" target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-book-fill"></i> Endorsed Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student.php">
                                <i class="bi bi-people-fill"></i> Student Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="printselect.php">
                                <i class="bi bi-printer-fill"></i> Print Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <center>
                    <div class="card py-4" style="width: 50%;">
                        <div class="text-center">
                            <img src="images/admin_pfp.png" {{-- class="card-img-top" alt="Card image cap" --}} width="25%" height="auto">
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center mb-4">{{ $user->name }}</h1>
                            @if ( true )
                                <p><b>Phone :</b> {{ $user->phone_number }}</p>
                                <p><b>Email:</b> {{ $user->email }}</p>
                            @else
                                {{-- <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label"><b>Phone :</b></label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label"><b>Email:</b></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="history.back();">Cancel</button>
                                </form> --}}
                            @endif
                        </div>

                    </div>
                    <br>
                    <button href="#" class="btn btn-edit">Edit Details</button>
                    <button type="button" class="btn btn-cancel" onclick="history.back();">Cancel</button>
                </center>
            </div>
        </div>
    </div>
</body>
