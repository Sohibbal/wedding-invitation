<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Tambahkan link ke Bootstrap Icons di <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
    <div class="login-container">
        <h1 class="login-title">REGISTER</h1>
        <div class="login-box">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <small style="color: red;">{{ $message }}</small>
                @enderror

                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <small style="color: red;">{{ $message }}</small>
                @enderror

                <div style="position: relative;">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <span id="togglePassword" onclick="togglePassword()" style="position: absolute; right: 0px; top: 12px; cursor: pointer;">
                        <i class="bi bi-eye-slash" id="iconPassword"></i>
                    </span>
                </div>
                @error('password')
                    <small style="color: red;">{{ $message }}</small>
                @enderror

                <div style="position: relative;">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    <span id="togglePassword" onclick="togglePassword()" style="position: absolute; right: 0px; top: 12px; cursor: pointer;">
                        <i class="bi bi-eye-slash" id="iconPassword"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <small style="color: red;">{{ $message }}</small>
                @enderror

                <button type="submit" class="login-btn">Register</button>
            </form>

            <p class="register-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </p>
        </div>
    </div>

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
