@extends('layouts.app')

@section('content')

<h1 class="text-danger text-center mt-5" style="font-size: 4rem">Selamat Datang Di Dashboard, Admin {{ Auth::user()->name }}</h1>

<div class="netflix-container mt-5">
    <div class="netflix-cards mb-5">
        <a href="{{ route('dashboard') }}" style="text-decoration: none;">
          <div class="card bg-primary text-white netflix-card p-4 text-center m-auto d-flex justify-content-center align-items-center" >
              <div>
                <h3>{{ $totalGuests }}</h3>
                  <div class="netflix-icon mb-2 d-flex mt-3">
                      <i class="fas fa-users me-3"></i>
                      <h5 class="text-start">Total Tamu</h5>
                  </div>
                  
              </div>
          </div> 
        </a>

        <div class="card bg-success text-white netflix-card p-4 text-center m-auto d-flex justify-content-center align-items-center">
            <h3>{{ $totalHadir }}</h3>
            <div class="netflix-icon mb-2 d-flex mt-3">
                <i class="fas fa-user-check me-3"></i>
                <h5 class="text-start">Status Hadir</h5>
            </div>
        </div>

        <div class="card bg-danger text-white netflix-card p-4 text-center m-auto d-flex justify-content-center align-items-center">
          <h3>{{ $totalTidakHadir }}</h3>
            <div class="netflix-icon mb-2 d-flex mt-3">
                <i class="fas fa-user-times me-3"></i>
                <h5 class="text-start">Tidak Hadir</h5>
            </div>
        </div>
    </div>
</div>
@endsection
