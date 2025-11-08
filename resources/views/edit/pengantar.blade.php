@extends('layouts.app')

@section('content')

<h1 class="text-danger">Edit Section Pengantar</h1>

<div class="row mt-4">
    <!-- Kolom Form Pengantar -->
    <div class="col-md-4 ms-3 me-5">
        <div class="edit-form" id="pengantar-form">
            <form action="{{ route('dashboard.update.pengantar') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="teks1" class="form-label">Teks Pengantar 1</label>
                    <textarea name="teks1" class="form-control" rows="3">{{ $pengantar->teks1 }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="teks2" class="form-label">Teks Pengantar 2</label>
                    <textarea name="teks2" class="form-control" rows="3">{{ $pengantar->teks2 }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="ayat" class="form-label">Judul Ayat</label>
                    <input type="text" name="ayat" class="form-control" value="{{ $pengantar->ayat }}">
                </div>

                <div class="mb-3">
                    <label for="isi_ayat" class="form-label">Isi Ayat</label>
                    <textarea name="isi_ayat" class="form-control" rows="4">{{ $pengantar->isi_ayat }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Kolom Preview Pengantar -->
    <div class="col-md-7">
        <section class="pengantar d-flex justify-content-center align-items-center " id="pengantar" style="background-color: #333; border-radius: 10px; font-size:smaller; min-height:20vh">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-10 text-center pengantar-teks">
                    <p>{{ $pengantar->teks1 ?? 'Teks 1' }}</p>
                    <p>{{ $pengantar->teks2  ?? 'Teks 2'}}</p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 col-md-8 col-8 text-center box-pengantar">
                    <h4>{{ $pengantar->ayat ?? 'Teks 3' }}</h4>
                    <p>{{ $pengantar->isi_ayat ?? 'Teks 4'}}</p>
                </div>
            </div>
        </div>
    </section>
    </div>
</div>
@endsection