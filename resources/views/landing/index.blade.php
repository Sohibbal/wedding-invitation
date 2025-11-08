<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ramdaazizah Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('countdown/dark.min.css') }}">
    <script src="{{ asset('countdown/simplyCountdown.umd.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <section id="cover"
        class="cover w-100 h-100 p-3 m-auto text-center d-flex justify-content-center align-items-center text-white hide-navbar">
        <main>
            <h4 id="tamu-cover"> Kepada Bpk/Ibu/Saudara/i,<span>{{ $guest->nama ?? 'Tamu Undangan' }}</span></h4>
            <h1 class="text-danger">{{ strtoupper($cover->nama_pria ?? 'NAMA PRIA') }} &
                {{ strtoupper($cover->nama_wanita ?? 'NAMA WANITA') }}</h1>
            <p>Resepsi akan diselenggarakan dalam</p>
            <div class="simply-countdown-dark" data-date="{{ $cover->tanggal_acara ?? '2025-12-31' }}">
            </div>
            <a href="#pengantar" class="arrow position-absolute bottom-0 start-50 translate-middle-x mb-3"
                onclick="enableScroll()">
                <i class="bi bi-arrow-bar-down fs-1"></i></a>
        </main>
    </section>


    <section class="pengantar d-flex justify-content-center align-items-center" id="pengantar">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-10 text-center pengantar-teks">
                    <p>{{ $pengantar->teks1 ?? 'Teks 1' }}</p>
                    <p>{{ $pengantar->teks2 ?? 'Teks 2' }}</p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-6 col-md-8 col-8 text-center box-pengantar">
                    <h4>{{ $pengantar->ayat ?? 'Teks 3' }}</h4>
                    <p>{{ $pengantar->isi_ayat ?? 'Teks 4' }}</p>
                </div>
            </div>
        </div>
    </section>


    <nav id="undangan" class="navbar navbar-expand sticky-top mynavbar">
        <div class="container">
            <a class="navbar-brand" href="#home">{{ $home->judul ?? 'Judul' }}</a>
            <div class="navbar-nav ms-auto d-none d-sm-flex">
                <a class="nav-link" href="#home">Home</a>
                <a class="nav-link" href="#info">Info</a>
                <a class="nav-link" href="#story">Story</a>
                <a class="nav-link" href="#galery">Galery</a>
                <a class="nav-link" href="#confirm">Confirm</a>
                <a class="nav-link" href="#gifts">Gifts</a>
            </div>
        </div>
    </nav>

    <section id="home" class="home px-4 d-flex justify-content-center align-items-center">
        <div class="container fade-in">
            <div class="row justify-content-center acara">
                <div class="col-md-8 text-center">
                    <h2>Acara Pernikahan</h2>
                    <h3>{{ $home->lokasi_tanggal ?? 'Lokasi & tanggal' }}</h3>
                    <p>{{ $home->deskripsi ?? 'Deskripsi' }}</p>
                </div>
            </div>

            <div class="row pengantin">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8 text-end">
                            <h3>{{ $home->nama_lengkap_pria ?? 'nama lengkap pria' }}</h3>
                            <p>{{ $home->ortu_pria ?? 'nama ortu mempelai pria' }}</p>
                        </div>
                        <div class="col-4">
                            <img src="{{ $home && $home->foto_pria ? asset('storage/' . $home->foto_pria) : asset('img/Dani2.jpg') }}"
                                    alt="Pria" class="img-responsive d-none d-lg-block">

                            <img src="{{ $home && $home->foto_pria ? asset('storage/' . $home->foto_pria) : asset('img/Dani2.jpg') }}"
                                alt="Pria" class="img-responsive d-block d-lg-none">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ $home && $home->foto_wanita ? asset('storage/' . $home->foto_wanita) : asset('img/Ainur2.jpg') }}"
                                    alt="Wanita" class="img-responsive d-none d-lg-block">
                            <img src="{{ $home && $home->foto_wanita ? asset('storage/' . $home->foto_wanita) : asset('img/Ainur2.jpg') }}"
                                alt="Wanita" class="img-responsive d-block d-lg-none">
                        </div>
                        <div class="col-8">
                            <h3>{{ $home->nama_lengkap_wanita ?? 'nama lengkap wanita' }}</h3>
                            <p>{{ $home->ortu_wanita ?? 'nama ortu mempelai wanita' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="info d-flex justify-content-center align-items-center" id="info">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Informasi Acara</h2>
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-md-5 col-5 text-center">
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
                        <div class="col-md-5 col-5 text-center">
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

                    <iframe src="{{ $info->google_maps ?? 'test' }}" width="83%" height="250"
                        style="border: solid 3px #ffffff; " allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
    </section>

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
                        @foreach ($stories as $index => $story)
                            <li class="{{ $index % 2 == 1 ? 'timeline-genap' : '' }}">
                                <div class="timeline-image">
                                    <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}"
                                        class="timeline-image"">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-header"></div>
                                    <div class="timline-body">
                                        <h4>{{ $story->title }}</h4>
                                        <p class="panel-p">{{ $story->content }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="galery" class="galery d-flex justify-content-center align-items-center">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-md-10 col-10 text-center">
                    <h2 class="text-uppercase fw-bold text-danger">Galeri</h2>
                    <p class="text-white">Setiap perjalanan menyimpan cerita...</p>
                </div>
            </div>

            <div
                class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 justify-content-center mt-2 mx-2 mx-sm-3 galery-container">
                @forelse ($galeri as $key => $item)
                    <div class="col mt-5">
                        <div class="gallery-card"
                            style="width: 100%; height: 300px; position: relative; overflow: hidden; border-radius: 20px;">
                            <a href="{{ asset('storage/gallery_temp/' . $item->image->filename) }}"
                                data-toggle="lightbox" data-caption="{{ $item->caption }}" data-gallery="gallery">
                                <img src="{{ asset('storage/gallery_temp/' . $item->image->filename) }}"
                                    alt="{{ $item->caption }}" class="img-fluid">
                            </a>
                            <div class="gallery-overlay">Galeri {{ $key + 1 }}</div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-white">Belum ada galeri yang ditambahkan.</p>
                @endforelse
            </div>

        </div>
    </section>



    <section id="confirm" class="confirm d-flex justify-content-center align-items-center">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Konfirmasi Kehadiran</h2>
                    <p>isi form dibawah ini untuk konfirmasi kehadiran.</p>
                </div>
            </div>

            <form id="statusForm"
                class="row row-cols-lg-auto row-cols-md-auto row-cols-sm-auto row-cols-auto g-3 align-items-center justify-content-center mt-2 form-confirm">
                @csrf
                @method('PUT')

                <div class="col-12 form-nama">
                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Nama</label>
                    <div class="input-group">
                        <input type="text" name="nama" value="{{ $guest->nama ?? 'Lokasi & tanggal' }} "
                            class="form-control" id="inlineFormInputGroupUsername" placeholder="Nama">
                    </div>
                </div>

                <div class="col-12 form-status">
                    <label class="visually-hidden" for="inlineFormSelectPref">Status</label>
                    <select name="status" class="form-select" id="inlineFormSelectPref">
                        <option disabled selected>Status</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                    </select>
                </div>

                <div class="col-12 btn-confirm">
                    <button type="submit" class="btn btn-danger confirm-btn">Kirim</button>
                </div>
            </form>


            <div class="row justify-content-center mt-5 discus">
                <div class="col-md-6 col-10">
                    <div id="disqus_thread" style="color:white"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                        var disqus_config = function() {
                            this.page.url =
                            '{{ url()->current() }}/user-{{ $user?->id ?? 'abcde' }}'; // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier =
                            "user-{{ $user->id ?? '9999a' }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            this.theme = 'dark';
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://ramdaazizah.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
    </section>



    <section id="gifts" class="gifts d-flex justify-content-center align-items-center">
        <div class="container fade-in">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Beri Hadiah</h2>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <ul class="list-group">

                        @if ($gift && $gift->qris_image)
                            <li class="list-group-item">
                                <div class="fw-bold bank">{{ $gift->qr_label ?? 'QRIS' }}</div>
                                <div>
                                    <a href="{{ asset('storage/' . $gift->qris_image) }}" data-toggle="lightbox">
                                        <img src="{{ asset('storage/' . $gift->qris_image) }}"
                                            style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px;">
                                    </a>
                                </div>
                            </li>
                        @endif

                        @if ($gift && $gift->bank1_number)
                            <li class="list-group-item">
                                <div class="fw-bold bank">{{ $gift->bank1_label ?? 'Bank 1' }}</div>
                                {{ $gift->bank1_number }}
                            </li>
                        @endif

                        @if ($gift && $gift->bank2_number)
                            <li class="list-group-item">
                                <div class="fw-bold bank">{{ $gift->bank2_label ?? 'Bank 2' }}</div>
                                {{ $gift->bank2_number }}
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <footer id="footer" class="footer d-flex justify-content-center align-items-center">
        <div class="row justify-content-center text-center">
            <div class="col text-center">
                <small class="footer-text block mb-5">&copy; 2025 {{ $home->judul ?? 'Judul' }} Wedding. All Rights
                    Reserved.</small>
            </div>
        </div>
    </footer>

    <div class="audio-container">
        <audio id="song" autoplay loop>
            <source src="{{ $cover && $cover->audio_path ? asset('storage/' . $cover->audio_path) : '' }}" type="audio/mp3">
        </audio>

        <div class="audi-icon" style="display: none;">
            <i class="bi bi-disc"></i>
        </div>
    </div>


    <!-- Bottom Nav -->
    <nav class="navbar navbar-dark bg-danger navbar-expand d-sm-none d-lg-none d-xl-none sticky-bottom mynavbottom">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a href="#home" class="nav-link"><i class="bi bi-house-heart-fill fs-1"></i><span
                        class="small d-block fs-5">Home</span></a>
            </li>
            <li class="nav-item">
                <a href="#info" class="nav-link"><i class="bi bi-postcard-heart-fill fs-1"></i><span
                        class="small d-block fs-5">Info</span></a>
            </li>
            <li class="nav-item">
                <a href="#story" class="nav-link"><i class="bi bi-arrow-through-heart-fill fs-1"></i><span
                        class="small d-block fs-5">Story</span></a>
            </li>
            <li class="nav-item">
                <a href="#galery" class="nav-link"><i class="bi bi-valentine fs-1"></i><span
                        class="small d-block fs-5">Galery</span></a>
            </li>
            <li class="nav-item">
                <a href="#confirm" class="nav-link"><i class="bi bi-chat-square-heart-fill fs-1"></i><span
                        class="small d-block fs-5">Confirm</span></a>
            </li>
        </ul>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.5/dist/index.bundle.min.js"></script>
    <script src="{{ asset('script.js') }}"></script>
    <script src="{{ asset('sticky.js') }}"></script>
    <script src="{{ asset('scroll.js') }}"></script>
    <script src="{{ asset('load.js') }}"></script>

    @php
        $tanggalAcara = \Carbon\Carbon::parse($cover->tanggal_acara ?? '2025-12-31');
    @endphp

    <script>
        simplyCountdown('.simply-countdown-dark', {
            year: "{{ $tanggalAcara->year }}",
            month: "{{ $tanggalAcara->month }}",
            day: "{{ $tanggalAcara->day }}",
            hours: 8, // Bisa juga disesuaikan dari DB
            words: {
                days: {
                    root: 'Hari',
                    lambda: (root, n) => n > 1 ? root + '' : root
                },
                hours: {
                    root: 'Jam',
                    lambda: (root, n) => n > 1 ? root + '' : root
                },
                minutes: {
                    root: 'Menit',
                    lambda: (root, n) => n > 1 ? root + '' : root
                },
                seconds: {
                    root: 'Detik',
                    lambda: (root, n) => n > 1 ? root + '' : root
                }
            },
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#statusForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('landing.update', $guest->id ?? '9999a') }}",
                method: "POST", // tetap POST karena pakai spoof PUT
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        background: '#1f1f1f',
                        color: '#fff',
                        confirmButtonColor: '#e50914'
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan saat mengirim data.',
                    });
                }
            });
        });
    </script>
</body>

</html>
