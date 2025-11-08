@extends('layouts.app')

@section('content')

<h1 class="text-danger">Edit Section Info</h1>

@php
use Illuminate\Support\Carbon;

$defaultTanggalAkad = isset($info->tanggal_akad)
    ? $info->tanggal_akad
    : (isset($cover->tanggal_acara)
        ? Carbon::parse($cover->tanggal_acara)->subDay()->format('Y-m-d')
        : '');

$defaultTanggalResepsi = $info->tanggal_resepsi ?? ($cover->tanggal_acara ?? '');
@endphp

<div class="row mt-4">
    <!-- Kolom Form Info -->
    <div class="col-md-5 ms-2 me-4">
        <div class="edit-form" id="info-form">
            <form action="{{ route('dashboard.update.info') }}" method="POST">
                @csrf

                <!-- Akad & Resepsi Side by Side -->
                <div class="row">
                    <!-- Akad Nikah -->
                    <div class="col-md-6 mb-4">
                        <div class="mb-3">
                            <label for="tanggalAkad" class="form-label">Tanggal Akad</label>
                            <input type="date" class="form-control" name="tanggal_akad" id="tanggalAkad"
                                value="{{ $defaultTanggalAkad }}">
                        </div>
                        <div class="mb-3">
                            <label for="jamAkad" class="form-label">Jam Akad</label>
                            <input type="text" class="form-control" name="jam_akad" id="jamAkad"
                                placeholder="08.00–10.00 WIB" value="{{ $info->jam_akad ?? '' }}">
                        </div>
                    </div>

                    <!-- Resepsi Pernikahan -->
                    <div class="col-md-6 mb-4">
                        <div class="mb-3">
                            <label for="tanggalResepsi" class="form-label">Tanggal Resepsi</label>
                            <input type="date" class="form-control" name="tanggal_resepsi" id="tanggalResepsi"
                                value="{{ $defaultTanggalResepsi }}">
                        </div>
                        <div class="mb-3">
                            <label for="jamResepsi" class="form-label">Jam Resepsi</label>
                            <input type="text" class="form-control" name="jam_resepsi" id="jamResepsi"
                                placeholder="11.00–14.00 WIB" value="{{ $info->jam_resepsi ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" id="alamatLengkap" rows="2"
                        placeholder="Jl. Contoh Alamat No. 123, Pekanbaru">{{ $info->alamat ?? '' }}</textarea>
                </div>

                <!-- Google Maps -->
                <div class="mb-3">
                    <label for="googleMapsLink" class="form-label">Link Embed Google Maps</label>
                    <textarea class="form-control" name="google_maps" id="googleMapsLink" rows="4"
                        placeholder="https://www.google.com/maps/embed?pb=...">{!! old('google_maps', $info->google_maps ?? '') !!}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Kolom Preview (kosong untuk sekarang) -->
    <div class="col-md-6 ms-3">
        <section class="info d-flex justify-content-center align-items-center" id="info" style="background-color: #333; border-radius: 10px; border-radius: 10px; max-height: 500px;">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-md-10 col-12 text-center">
                    <h2>Informasi Acara</h2>
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-md-6 col-5 text-center">
                            <div class="card text-center mb-3">
                                <div class="card-header">
                                    Akad Nikah
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <i class="bi bi-calendar-heart d-block text-danger mb-1"></i>
                                            <span>
                                                {{ \Carbon\Carbon::parse($info->tanggal_akad ?? '2025-06-06')->locale('id')->translatedFormat('l, j F Y') }}<br>
                                                {{ $info->jam_akad ?? '08.00–10.00 WIB' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-5 text-center">
                            <div class="card text-center">
                                <div class="card-header">
                                    Resepsi Pernikahan
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <i class="bi bi-calendar-heart d-block text-danger  mb-1"></i>
                                            <span>
                                                {{ \Carbon\Carbon::parse($info->tanggal_resepsi ?? '2025-06-07')->locale('id')->translatedFormat('l, j F Y') }}<br>
                                                {{ $info->jam_resepsi ?? '11.00–14.00 WIB' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <p>
                        Alamat: {{ $info->alamat ?? 'Teladan Court, Gg. Zamrud 1, Kec. Tampan, Kota Pekanbaru, Riau' }}
                    </p>

                    {{-- Tampilkan embed Google Maps (langsung dari iframe) --}}
                    <iframe src="{{ $info->google_maps ?? 'test'}}" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
    </section>
    </div>
</div>

@endsection
