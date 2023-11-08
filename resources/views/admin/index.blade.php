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
