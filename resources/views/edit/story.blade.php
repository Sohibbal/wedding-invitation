@extends('layouts.app')

@section('content')

<h1 class="text-danger ms-2">Edit Story</h1>
<div class="container">
    <form action="{{ route('story.update', $story->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image">Gambar Baru (opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Judul Cerita</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $story->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Cerita</label>
            <textarea name="content" class="form-control" rows="4" required>{{ old('content', $story->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('dashboard.edit.story') }}" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>

<div class="row">
    <div class="col">
        <ul class="timeline">
            <li class="timeline-genap">
                                <div class="timeline-image">
                                    <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}" class="timeline-image"">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-header"></div>
                                    <div class="timline-body">
                                        <h4>{{ $story->title }}</h4>
                                        <p class="panel-p">{{ $story->content }}</p>
                                        
                                    </div>

                                </div>
                            </li>
        </ul>
    </div>
</div>
@endsection