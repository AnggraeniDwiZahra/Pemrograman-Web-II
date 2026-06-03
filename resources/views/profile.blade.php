@extends('layout')

@section('title', 'Profil')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="text-center mb-5">
                <img src="{{ asset('img/' . $profile->gambar) }}" 
                     class="rounded-circle border border-4 border-maroon-neon p-2 mb-3" 
                     alt="Foto Profil" 
                     style="width: 140px; height: 140px; object-fit: cover; background-color: #16161a;">
                
                <h1 class="fw-bold text-white mb-1">{{ $profile->nama }}</h1>
                <p class="text-light-muted mb-4 fs-5">Mahasiswa {{ $profile->prodi }}</p>
                
                <div class="row g-3 justify-content-center text-start">
                    <div class="col-sm-5 rounded p-3 m-2" style="background-color: #16161a; border: 1px solid #222225;">
                        <small class="text-light-muted d-block mb-1 fw-medium">NIM</small>
                        <span class="fw-semibold text-white">{{ $profile->nim }}</span>
                    </div>
                    <div class="col-sm-5 rounded p-3 m-2" style="background-color: #16161a; border: 1px solid #222225;">
                        <small class="text-light-muted d-block mb-1 fw-medium">Hobi</small>
                        <span class="fw-semibold text-white">{{ $profile->hobi }}</span>
                    </div>
                    <div class="col-md-10 rounded p-3 m-2" style="background-color: #16161a; border: 1px solid #222225;">
                        <small class="text-light-muted d-block mb-1 fw-medium">Keahlian</small>
                        <span class="fw-semibold text-white">{{ $profile->skill }}</span>
                    </div>
                </div>
            </div>

            <h4 class="fw-bold text-white mb-4 border-bottom pb-2" style="border-color: #222225 !important;">📂 Pengalaman & Kegiatan</h4>
            
            @foreach($experiences as $index => $exp)
            <div class="card border-0 rounded-3 p-4 mb-3" style="background-color: #16161a; border: 1px solid #222225 !important;">
                <div class="row align-items-center">
                    <div class="col-sm-2 col-3 text-center mb-sm-0 mb-3">
                        <img src="{{ asset('img/' . $exp->gambar) }}" 
                             class="rounded-3 border border-secondary" 
                             alt="Icon" 
                             style="width: 65px; height: 65px; object-fit: cover; background-color: #0c0c0e;">
                    </div>
                    
                    <div class="col-sm-10 col-9">
                        <div class="d-sm-flex justify-content-between align-items-baseline">
                            <h5 class="fw-bold text-white mb-1" style="font-size: 1.1rem;">{{ $exp->judul }}</h5>
                            <span class="badge bg-dark text-maroon-neon border border-maroon-neon px-2 py-1 small fw-normal">{{ $exp->waktu }}</span>
                        </div>
                        <p class="small my-2 text-truncate text-light-content" style="max-width: 500px;">
                            {{ $exp->deskripsi }}
                        </p>
                        <a href="{{ route('detail', $index + 1) }}" class="btn btn-sm btn-outline-custom px-3 rounded-pill mt-1" style="font-size: 0.75rem;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<style>
    .text-light-muted {
        color: #a0a0a5 !important;
    }
    .text-light-content {
        color: #cccccc !important;
    }
</style>
@endsection