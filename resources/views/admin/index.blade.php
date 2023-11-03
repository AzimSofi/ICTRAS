<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTRAS | Admin</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @include('layouts.app')

<body>
    <!-- main content -->
    <div class="container mt-5 pt-3">
        <div class="row">
            <!-- sidebar -->
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
            <!-- main content area -->
            <div class="col-lg-9">
                <center>
                    <div class="card" style="width: 50%;">
                        <img src="images/profile2.png" class="card-img-top" alt="Card image cap">
                        <div class="card-body">
                            <h1 class="card-title text-center">{{ $user->name }}</h1>
                            <p><b>Email:</b> {{ $user->email }}</p>
                            <p><b>Matric No:</b> {{ $user->matric_no }}</p>
                            <p><b>Department:</b> {{ $user->department }}</p>
                            <p><b>Semester:</b></p>
                        </div>
                    </div>
                    <br>
                    <a href="editprofile.php" class="btn btn-primary">Edit Details</a>
                </center>
            </div>
        </div>
    </div>
    <!-- main content end -->
</body>
