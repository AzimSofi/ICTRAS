<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICTRAS | Lecturer</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @include('layouts.app')

<body>
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-lg-3">
                @include('lecturer.sidebar')
            </div>
            <div class="col-lg-9">
                <center>
                    <div class="card py-4" style="width: 50%;">
                        <div class="text-center">
                            <img src="images/admin_pfp.png" {{-- class="card-img-top" alt="Card image cap" --}} width="150px" height="auto">
                        </div>
                        <div class="card-body">
                            <h1 class="card-title text-center mb-4">{{ $user->name }}</h1>
                            <p><b>Phone :</b> {{ $user->phone_number }}</p>
                            <p><b>Email:</b> {{ $user->email }}</p>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit Details
                    </button>
                </center>
            </div>
        </div>
    </div>
    @include('lecturer.edit')
</body>
