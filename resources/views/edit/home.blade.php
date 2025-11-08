@extends('layouts.app')

@section('content')

<h1 class="text-danger">Edit Section Home</h1>

<div class="row mt-4">
    <!-- Kolom Form Home -->
    <div class="col-md-4 ms-3 me-5">
        <div class="edit-form" id="home-form">
            <form action="{{ route('dashboard.update.home') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judulAcara" class="form-label">Title</label>
                    <input type="text" class="form-control" name="judul" id="judulAcara"
                        value="{{ $home->judul }}">
                </div>

                <div class="mb-3">
                    <label for="lokasiAcara" class="form-label">Lokasi & Tanggal</label>
                    <input type="text" class="form-control" name="lokasi_tanggal" id="lokasiAcara"
                        value="{{ $home->lokasi_tanggal }}">
                </div>

                <div class="mb-3">
                    <label for="deskripsiAcara" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsiAcara" rows="3">{{ $home->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="namaOrtuPria" class="form-label">Orang Tua Pria</label>
                    <input type="text" class="form-control" name="ortu_pria" id="namaOrtuPria"
                        value="{{ $home->ortu_pria }}">
                </div>

                <div class="mb-3">
                    <label for="namaLengkapPria" class="form-label">Nama Lengkap Pengantin Pria</label>
                    <input type="text" class="form-control" name="nama_lengkap_pria" id="namaLengkapPria"
                        value="{{ $home->nama_lengkap_pria }}">
                </div>

                <div class="mb-3">
                    <label for="namaOrtuWanita" class="form-label">Orang Tua Wanita</label>
                    <input type="text" class="form-control" name="ortu_wanita" id="namaOrtuWanita"
                        value="{{ $home->ortu_wanita }}">
                </div>

                <div class="mb-3">
                    <label for="namaLengkapWanita" class="form-label">Nama Lengkap Pengantin Wanita</label>
                    <input type="text" class="form-control" name="nama_lengkap_wanita" id="namaLengkapWanita"
                        value="{{ $home->nama_lengkap_wanita }}">
                </div>

                <div class="mb-3">
                    <label for="fotoPria" class="form-label">Foto Pengantin Pria</label>
                    <input type="file" class="form-control" name="foto_pria" id="fotoPria">
                </div>

                <div class="mb-3">
                    <label for="fotoWanita" class="form-label">Foto Pengantin Wanita</label>
                    <input type="file" class="form-control" name="foto_wanita" id="fotoWanita">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Kolom Preview Home -->
    <div class="col-md-6 ms-5">
        <section id="home" class="home px-4 d-flex justify-content-center align-items-center" 
        style="background-color: #333; border-radius: 10px; max-height: 400px; overflow: hidden; font-size:smaller;">
          <div class="container fade-in">
              <div class="row justify-content-center acara">
                  <div class="col-md-8 text-center p-3">
                      <h2>Acara Pernikahan</h2>
                      <p>{{ $home->lokasi_tanggal ?? 'Lokasi & tanggal'}}</p>
                      <p>{{ $home->deskripsi ?? 'Deskripsi'}}</p>
                  </div>
              </div>

              <div class="row pengantin">
                  <div class="col-lg-6">
                      <div class="row">
                          <div class="col-8 text-end">
                              <h3>{{ $home->nama_lengkap_pria ?? 'nama lengkap pria' }}</h3>
                              <p>{{ $home->ortu_pria ?? 'nama ortu mempelai pria'}}</p>
                          </div>
                          <div class="col-4">
                            <div style="height: 100px; overflow: hidden;">
                                <img src="{{ $home && $home->foto_pria ? asset('storage/' . $home->foto_pria) : asset('img/ss.jpg') }}"
                                alt="Pria" class="img-responsive d-none d-lg-block" style="height: 100%; width: 100%; object-fit: contain;">
                            </div>

                            <img src="{{ $home && $home->foto_pria ? asset('storage/' . $home->foto_pria) : asset('img/ss.jpg')}}" alt="Pria"
                            class="img-responsive d-block d-lg-none" >
                        </div>
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="row">
                          <div class="col-4">
                            <div style="height: 100px; overflow: hidden;">
                                <img src="{{ $home && $home->foto_wanita ? asset('storage/' . $home->foto_wanita) : asset('img/ss.jpg') }}" alt="Wanita"
                                    class="img-responsive d-none d-lg-block" style="height: 100%; width: 100%; object-fit: contain;">
                            </div>
                            <img src="{{ $home && $home->foto_wanita ? asset('storage/' . $home->foto_wanita) : asset('img/ss.jpg') }}" alt="Wanita"
                                class="img-responsive d-block d-lg-none">
                        </div>
                          <div class="col-8">
                              <h3>{{ $home->nama_lengkap_wanita ?? 'nama lengkap wanita'}}</h3>
                              <p>{{ $home->ortu_wanita ?? 'nama ortu mempelai wanita'}}</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    </div>
</div>

@endsection
