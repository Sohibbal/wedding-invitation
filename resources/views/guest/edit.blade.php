@extends('layouts.app')

@section('content')

<div id="edit-tamu-form">
    <h1 class="text-danger">Edit Tamu</h1>
    <div class="form-wrapper">

        <form action="{{ url('/dashboard/' . $guest->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nama">Nama Tamu</label>
            <input type="text" id="nama" name="nama" value="{{ $guest->nama }}" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="HADIR" {{ $guest->status == 'HADIR' ? 'selected' : '' }}>Hadir</option>
                <option value="TIDAK HADIR" {{ $guest->status == 'TIDAK HADIR' ? 'selected' : '' }}>Tidak Hadir</option>
            </select>

            <div class="d-flex justify-content-between mt-3 back">
                <a href="{{ url('/dashboard') }}" class="btn-submit bg-secondary text-white">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn-submit bg-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
