@extends('layout')

@section('title', 'Beranda')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center py-5">
        
        <div class="col-md-5 text-center mb-5 mb-md-0">
            <div class="d-inline-block position-relative">
                <img src="{{ asset('img/' . $profile->gambar) }}" 
                     class="rounded-circle border border-4 border-maroon-neon p-2" 
                     alt="Foto Profil" 
                     style="width: 280px; height: 280px; object-fit: cover; background-color: #16161a;">
            </div>
        </div>
        
        <div class="col-md-7 ps-md-5">            
            <h1 class="fw-bold text-white mb-3 display-3" style="letter-spacing: -1px;">
                {{ $profile->nama }}
            </h1>
            
            <p class="mb-4 lh-lg" style="color: #88888b; max-width: 540px;">
                Mahasiswi program studi <span class="text-white">{{ $profile->prodi }}</span>. Fokus pada pengembangan web, perancangan UI/UX, serta eksplorasi teknologi jaringan.
            </p>
            
            <div class="d-flex gap-3 mt-4">
                <a href="{{ route('profile') }}" class="btn btn-maroon-neon px-4 py-2">
                    Buka Profil
                </a>
                <a href="mailto: 2410817220018@mhs.ulm.ac.id" target="_blank" class="btn btn-outline-custom px-4 py-2">
                    Contact Me
                </a>
            </div>
        </div>

    </div>
</div>
@endsection