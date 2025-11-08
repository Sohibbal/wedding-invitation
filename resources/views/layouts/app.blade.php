<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('countdown/dark.min.css') }}">
    <script src="{{ asset('countdown/simplyCountdown.umd.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    
    @stack('styles')
</head>

<body>
    <div class="dashboard-container d-flex">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="content flex-grow-1">
            @yield('content')
        </div>
    </div>

    <!-- Success Alert -->
    @if (session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            background: '#1f1f1f',
            color: '#fff',
            confirmButtonColor: '#e50914'
        });
        </script>
    @endif

    <!-- Error Alert -->
    @if (session('error'))
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
            background: '#1f1f1f',
            color: '#fff',
            confirmButtonColor: '#e50914'
        });
        </script>
    @endif

    @stack('scripts')
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const editToggle = document.getElementById("editToggle");
        const editSubmenu = document.getElementById("editSubmenu");
        const editArrow = document.getElementById("editArrow");

        editToggle.addEventListener("click", function (e) {
            e.preventDefault(); // Hindari navigasi default

            // Toggle submenu
            editSubmenu.classList.toggle("d-none");

            // Optional: toggle panah rotasi
            editArrow.classList.toggle("rotate-arrow");
        });
    });
</script>

</body>

</html>