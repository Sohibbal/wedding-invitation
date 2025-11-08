@extends('layouts.app')

@section('content')
    <h1 class="text-danger">Edit Section Cover</h1>

    <!-- Edit Form dan Preview Cover -->
    <div class="row mt-4">
        <!-- Kolom Form -->
        <div class="col-md-4 ms-3 me-5">
            <div class="edit-form" id="cover-form">
                <form action="{{ route('dashboard.update.cover') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="namaPria" class="form-label">Nama Pengantin Pria</label>
                        <input type="text" name="nama_pria" class="form-control" id="namaPria"
                            value="{{ $cover->nama_pria }}">
                    </div>

                    <div class="mb-3">
                        <label for="namaWanita" class="form-label">Nama Pengantin Wanita</label>
                        <input type="text" name="nama_wanita" class="form-control" id="namaWanita"
                            value="{{ $cover->nama_wanita }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggalAcara" class="form-label">Tanggal Acara</label>
                        <input type="date" name="tanggal_acara" class="form-control" id="tanggalAcara"
                            value="{{ $cover->tanggal_acara }}">
                    </div>

                    <div class="mb-3">
                        <label for="audio" class="form-label">Unggah Lagu (MP3)</label>
                        <input type="file" name="audio" class="form-control" id="audio" accept="audio/mp3">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Kolom Preview Cover -->
        <div class="col-md-7">
            <section id="cover"
                class="cover w-100 p-3 text-center d-flex justify-content-center align-items-center text-white hide-navbar"
                style="background-color: #333; border-radius: 10px; max-height: 400px; overflow: hidden;">
                <main>
                    <h4 id="tamu-cover">Kepada Bpk/Ibu/Saudara/i, <span></span></h4>
                    <h1 class="text-danger">{{ strtoupper($cover->nama_pria ?? 'NAMA PRIA') }} &amp;
                        {{ strtoupper($cover->nama_wanita ?? 'NAMA WANITA') }}</h1>
                    <p>Resepsi akan diselenggarakan dalam</p>
                    <div class="simply-countdown-dark" data-date="{{ $cover->tanggal_acara ?? '2025-12-31' }}"></div>
                    <a href="#pengantar" class="arrow position-absolute bottom-0 start-50 translate-middle-x mb-3"
                        onclick="enableScroll()">
                        <i class="bi bi-arrow-bar-down fs-1"></i>
                    </a>
                </main>
            </section>
        </div>

    </div>

    @php
        // Ambil tanggal acara, pakai default jika tidak ada
        $tanggalAcara = \Carbon\Carbon::parse($cover->tanggal_acara ?? '2025-12-31');
    @endphp

    <script>
        simplyCountdown('.simply-countdown-dark', {
            year: "{{ $tanggalAcara->year }}",
            month: "{{ $tanggalAcara->month }}",
            day: "{{ $tanggalAcara->day }}",
            hours: 8, // Bisa juga diambil dari DB kalau ada
            words: {
                days: {
                    root: 'Hari',
                    lambda: function(root, n) {
                        return n > 1 ? root : root;
                    }
                },
                hours: {
                    root: 'Jam',
                    lambda: function(root, n) {
                        return n > 1 ? root : root;
                    }
                },
                minutes: {
                    root: 'Menit',
                    lambda: function(root, n) {
                        return n > 1 ? root : root;
                    }
                },
                seconds: {
                    root: 'Detik',
                    lambda: function(root, n) {
                        return n > 1 ? root : root;
                    }
                }
            },
        });
    </script>
@endsection
