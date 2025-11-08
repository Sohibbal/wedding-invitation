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