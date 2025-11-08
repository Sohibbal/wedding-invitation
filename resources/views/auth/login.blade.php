<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- External CSS -->
    <link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tambahkan link ke Bootstrap Icons di <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="login-container">
        <h1 class="login-title">LOGIN</h1>
        <div class="login-box">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="text" name="email" class="form-control" placeholder="Username" required autofocus>

                <div style="position: relative;">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <span id="togglePassword" onclick="togglePassword()" style="position: absolute; right: 0px; top: 12px; cursor: pointer;">
                        <i class="bi bi-eye-slash" id="iconPassword"></i>
                    </span>
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <p class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Register di sini</a>
            </p>
        </div>
    </div>

    <!-- SweetAlert Notification via Query Parameter -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek URL parameter untuk account_deleted
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('account_deleted') === 'true') {
                // Tampilkan SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Akun Anda berhasil dihapus',
                    background: '#1f1f1f',
                    color: '#fff',
                    confirmButtonColor: '#e50914'
                });
                
                // Hapus parameter dari URL (opsional)
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        });
    </script>

    <!-- SweetAlert Notification -->
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
    
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}",
                background: '#1f1f1f',
                color: '#fff',
                confirmButtonColor: '#e50914'
            });
        </script>
    @endif
    
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                background: '#1f1f1f',
                color: '#fff',
                confirmButtonColor: '#e50914'
            });
        </script>
    @endif

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById("password");
        const icon = document.getElementById("iconPassword");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    }
</script>


</body>
</html>