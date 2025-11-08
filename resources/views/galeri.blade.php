@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-danger">Add Section Galeri</h1>

    {{-- Dropzone --}}
    <form action="{{ route('galeri.upload.temp') }}" method="POST" class="dropzone" id="myDropzone">
        @csrf
    </form>

    <hr>

    <h3>Gambar Sementara</h3>
    <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 justify-content-center mt-2 mx-2 mx-sm-3 galery-container">
        @forelse ($temporary as $image)
            <div class="col mt-5">
                <div class="gallery-card" style="width: 100%; height: 250px; position: relative; overflow: hidden; border-radius: 20px;">
                    <img src="{{ asset('storage/gallery_temp/' . $image->filename) }}"
                        alt="Preview"
                        class="img-fluid"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="p-2 mt-2" style="background: rgba(0, 0, 0, 0.5); border-radius: 10px;">
                    <!-- Form tambah galeri dan hapus -->
                     <form action="{{ route('galeri.confirm') }}" method="POST" class="mb-2">
                            @csrf
                            <input type="hidden" name="temporary_id" value="{{ $image->id }}">
                            <input type="text" name="caption" class="form-control mb-2" placeholder="Tulis caption (opsional)">
                            <button type="submit" class="btn btn-success btn-sm w-100">Jadikan Galeri</button>
                        </form>
                        <form action="{{ route('galeri.temp.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-4">
                <p class="text-white">Belum ada galeri sementara yang diunggah.</p>
            </div>
        @endforelse
    </div>

    <!-- <div id="temporary-gallery" class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 justify-content-center mt-2 mx-2 mx-sm-3 galery-container">
        {{-- isi di sini akan diganti secara dinamis --}}
        @include('components.temporary', ['temporary' => $temporary])
    </div> -->


    <hr>

    <h3>Galeri Anda</h3>
    <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 justify-content-center mt-2 mx-2 mx-sm-3 galery-container">
        @forelse ($galleries as $galeri)
            <div class="col mt-5">
                <div class="gallery-card" style="width: 100%; height: 250px; position: relative; overflow: hidden; border-radius: 20px;">
                    <a href="{{ asset('storage/gallery_temp/' . ($galeri->image?->filename ?? 'default.jpg')) }}"
                    data-toggle="lightbox"
                    data-caption="{{ $galeri->caption }}"
                    data-gallery="gallery">
                        <img src="{{ asset('storage/gallery_temp/' . ($galeri->image?->filename ?? 'default.jpg')) }}"
                            alt="{{ $galeri->caption }}"
                            class="img-fluid"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </a>
                </div>
                <div class="p-2 text-white text-center mt-2" style="background: rgba(0, 0, 0, 0.5); border-radius: 10px;">
                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Hapus dari galeri?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-4">
                <p class="text-white">Belum ada galeri yang ditambahkan.</p>
            </div>
        @endforelse
    </div>



</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script>
Dropzone.options.myDropzone = {
    maxFilesize: 2,
    acceptedFiles: ".jpeg,.jpg,.png",
    success: function (file, response) {
        file.previewElement.classList.add("dz-success");

        // Ambil ulang isi galeri sementara
        fetch("{{ route('galeri.temp.fetch') }}")
            .then(response => response.json())
            .then(data => {
                document.getElementById("temporary-gallery").innerHTML = data.html;
            });
    },
    error: function(file, response) {
        file.previewElement.classList.add("dz-error");
        let message = typeof response === "string" ? response : (response.message || "Upload gagal");
        file.previewElement.querySelector("[data-dz-errormessage]").textContent = message;
    }
};
</script>

@endsection
