<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/adminlte/adminlte.min.css') }}">

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('admin.navbar')
        @include('admin.sidebar')
        
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('admin.footer')
    </div>
    <script src="{{ asset('js/adminlte/adminlte.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
