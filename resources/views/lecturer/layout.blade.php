<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Font awesome --}}
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-02670e9412103b5852dcbe140d278c49.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/sharp-light.css">

    {{-- @include('sweetalert::alert') --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <script src="js/admin.js"></script>
</head>

<body>
    <div class="container mt-5 pt-3">
        <div class="row">
            <div id="sidebar" class="col-lg-3">
                @include('admin.sidebar')
            </div>
            <div id="main-content" class="col-lg-9">
                @yield('content')
                <button id="toggleSidebar">Toggle Sidebar</button>
                <div style="margin-bottom: 50px"></div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#toggleSidebar').click(function() {
            $('#sidebar').toggleClass('hidden');
            $('#main-content').toggleClass('col-lg-9 col-lg-12');
        });
    });
</script>
