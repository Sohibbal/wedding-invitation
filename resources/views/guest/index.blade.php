@extends('layouts.app')

@section('content')
    <h1 class="text-danger">Data Tamu</h1>

    <div class="d-flex justify-content-end mb-3 mt-3 me-2">
        <form action="{{ route('dashboard.create') }}">
            <button type="submit" class="btn btn-success btn-md">
                Tambah Tamu
                <i class="fas fa-add"></i>
            </button>
        </form>
    </div>

    <!-- Tabel Tamu -->
    <div class="table-wrapper mb-4" id="tabelTamu">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <!-- <th>Link Undangan</th> -->
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $index => $guest)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $guest->nama }}</td>
                        <td>{{ $guest->tanggal }}</td>
                        <td style="width: 200px;">{{ $guest->status }}</td>
                        <td class="d-flex gap-2 aksi">
                            <a class="btn btn-primary btn-sm" style="background-color: #0d45a1;"
                                href="{{ route('landing.invitation', [
                                    'hashid' => Hashids::encode($guest->user_id),
                                    'nama_tamu' => urlencode($guest->nama),
                                ]) }}"
                                target="_blank">
                                Link Undangan
                            </a>
                            <form action="{{ route('dashboard.edit', $guest->id) }}" method="GET">
                                <button type="submit" class="btn btn-warning btn-sm">Edit <i
                                        class="fas fa-edit"></i></button>
                            </form>
                            <form action="{{ route('dashboard.destroy', $guest->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tamu {{ $guest->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus <i
                                        class="fas fa-trash"></i></button>
                            </form>
                            @if ($guest->whatsapp)
                                <a class="btn btn-success btn-sm"
                                    href="https://wa.me/{{ $guest->whatsapp }}?text={{ urlencode(
                                        'Hai ' .
                                            $guest->nama .
                                            ', berikut undangan untukmu: ' .
                                            route('landing.invitation', [
                                                'hashid' => Hashids::encode($guest->user_id),
                                                'nama_tamu' => urlencode($guest->nama),
                                            ]),
                                    ) }}"
                                    target="_blank">
                                    Share WA <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end me-2">
        {{ $guests->links('pagination::bootstrap-5') }}
    </div>
@endsection
