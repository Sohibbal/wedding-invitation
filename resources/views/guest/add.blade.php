@extends('layouts.app')

@section('content')

<div id="add-tamu-form">
    <h1 class="text-danger">Tambah Tamu</h1>
    <div class="form-wrapper">
        @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('dashboard.store') }}" method="POST">
            @csrf
            <label for="nama">Nama Tamu</label>
            <input type="text" id="nama" name="nama" required>

            <label for="whatsapp">Nomor WhatsApp</label>
            <input type="text" id="whatsapp" name="whatsapp" placeholder="Contoh: 6281234567890" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Tidak Hadir">Tidak Hadir</option>
                <option value="Hadir">Hadir</option>
            </select>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn-submit bg-success"><i class="fas fa-plus"></i> Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection
