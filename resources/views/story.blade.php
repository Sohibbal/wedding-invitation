@extends('layouts.app')

@section('content')

<h1 class="text-danger">Add & Edit Section Story</h1>
<div class="edit-form" id="story-form">
    <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data" class="mb-5">
    @csrf
    <div class="mb-3">
        <label for="image">Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="title">Judul Cerita</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content">Isi Cerita</label>
        <textarea name="content" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
</div>

<section id="story" class="story d-flex justify-content-center align-items-center">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-md-10 col-10 text-center">
                    <h2>Cerita Kami</h2>
                    <p>Banyak kisah yang telah kami lalui hingga akhirnya kami dapat bersatu.
                        Kisah yang akan selalu kami kenang dan kini kami bagikan untuk Anda.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="timeline">
                        @foreach($stories as $index => $story)
                            <li class="{{ $index % 2 == 1 ? 'timeline-genap' : '' }}">
                                <div class="timeline-image" style="height: 180px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}" class="timeline-image" style="height: 100%; width: auto; object-fit: contain;">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-header"></div>
                                    <div class="timline-body">
                                        <h4>{{ $story->title }}</h4>
                                        <p class="panel-p">{{ $story->content }}</p>

                                        <div class="d-flex gap-2">
                                            <a href="{{ route('story.edit', $story->id) }}" class="btn btn-warning btn-sm text-dark">Edit</a>

                                            <form action="{{ route('story.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Hapus cerita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection