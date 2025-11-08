@extends('layouts.app')

@section('content')
<h1 class="text-danger">Edit Section Hadiah</h1>

<!-- Edit Form dan Preview Gift -->
<div class="row mt-4">
    <!-- Kolom Form -->
    <div class="col-md-4 ms-3 me-5">
        <div class="edit-form" id="gift-form">
            <form action="{{ route('dashboard.update.gift') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="qr_label" class="form-label">Teks Label QR</label>
                    <input type="text" name="qr_label" class="form-control"
                        value="{{ old('qr_label', $gift->qr_label ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="qris_image" class="form-label">QRIS Image</label>
                    <input type="file" name="qris_image" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="bank1_label" class="form-label">Label Bank 1</label>
                    <input type="text" name="bank1_label" class="form-control"
                        value="{{ old('bank1_label', $gift->bank1_label ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="bank1_number" class="form-label">Nomor Rekening Bank 1</label>
                    <input type="text" name="bank1_number" class="form-control"
                        value="{{ old('bank1_number', $gift->bank1_number ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="bank2_label" class="form-label">Label Bank 2</label>
                    <input type="text" name="bank2_label" class="form-control"
                        value="{{ old('bank2_label', $gift->bank2_label ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="bank2_number" class="form-label">Nomor Rekening Bank 2</label>
                    <input type="text" name="bank2_number" class="form-control"
                        value="{{ old('bank2_number', $gift->bank2_number ?? '') }}">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Kolom Preview -->
    <div class="col-md-7">
    <section id="gifts"
             class="gifts p-4 text-white"
             style="background-color: #333; border-radius: 10px; max-height: 550px; overflow: hidden;">
        <div class="container fade-in">
            <div class="row justify-content-center mb-3">
                <div class="col-12 text-center">
                    <h2 class="">Beri Hadiah</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ul class="list-group text-center">

                        @if ($gift && $gift->qris_image)
                            <li class="list-group-item">
                                <div class="fw-bold bank mb-2">{{ $gift->qr_label ?? 'QRIS' }}</div>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ asset('storage/' . $gift->qris_image) }}" data-toggle="lightbox">
                                        <img src="{{ asset('storage/' . $gift->qris_image) }}"
                                             style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
                                    </a>
                                </div>
                            </li>
                        @endif

                        @if ($gift && $gift->bank1_number)
                            <li class="list-group-item">
                                <div class="fw-bold bank">{{ $gift->bank1_label ?? 'Bank 1' }}</div>
                                <div>{{ $gift->bank1_number }}</div>
                            </li>
                        @endif

                        @if ($gift && $gift->bank2_number)
                            <li class="list-group-item">
                                <div class="fw-bold bank">{{ $gift->bank2_label ?? 'Bank 2' }}</div>
                                <div>{{ $gift->bank2_number }}</div>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

</div>

@endsection
