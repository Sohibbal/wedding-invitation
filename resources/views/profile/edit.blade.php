@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #141414;
        color: white;
    }

    .container {
        background-color: #1f1f1f;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.1);
    }

    input.form-control, input[type="password"] {
        background-color: #333;
        color: white;
        border: 1px solid #555;
    }

    input.form-control:focus, input[type="password"]:focus {
        background-color: #444;
        border-color: #e50914;
        color: white;
    }

    label {
        font-weight: bold;
        color: #e5e5e5;
    }

    .btn-primary {
        background-color: #e50914;
        border-color: #e50914;
    }

    .btn-primary:hover {
        background-color: #f6121d;
        border-color: #f6121d;
    }

    .btn-danger {
        background-color: #b0060f;
        border-color: #b0060f;
    }

    .btn-danger:hover {
        background-color: #d91c1c;
        border-color: #d91c1c;
    }

    hr {
        border-color: #444;
    }

    .text-sm {
        font-size: 0.9rem;
        color: #aaa;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Edit Profil</h2>

    @if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: @json(session('success')),
                background: '#1f1f1f',
                color: '#fff',
                confirmButtonColor: '#e50914'
            });
        });
    </script>
    @endif

    @if (session('account_deleted'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Akun Anda berhasil dihapus',
            background: '#1f1f1f',
            color: '#fff',
            confirmButtonColor: '#e50914'
        });
    </script>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" onclick="window.location.href='/dashboard';" class="btn btn-secondary">Kembali ke Dashboard</button>
    </form>

    <hr class="my-5">

    <!-- Form Update Password -->
    <h3 class="mb-3">Update Password</h3>
    <p class="text-sm mb-4">Pastikan akun Anda menggunakan password yang panjang dan acak untuk tetap aman.</p>

    @if (session('status') === 'password-updated')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Password berhasil diperbarui',
                background: '#1f1f1f',
                color: '#fff',
                confirmButtonColor: '#e50914'
            });
        });
    </script>
    @endif

    <form method="post" action="{{ route('password.update') }}" class="mb-5">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password">Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password">Password Baru</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
            @error('password', 'updatePassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation">Konfirmasi Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Password</button>
    </form>

    <hr class="my-5">

    <h3>Delete Account</h3>
    <p class="text-sm">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.</p>

    <form id="delete-account-form" method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="button" id="confirm-delete-btn" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteBtn = document.getElementById('confirm-delete-btn');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', function () {
                Swal.fire({
                    title: 'Yakin ingin hapus akun?',
                    text: "Akun kamu akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    background: '#1f1f1f',
                    color: '#fff',
                    confirmButtonColor: '#e50914',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-account-form').submit();
                    }
                });
            });
        }
    });
</script>
@endpush