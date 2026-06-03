@extends('layout')

@section('title', 'Detail Pengalaman')

@section('content')
<div class="container-fluid px-md-5 py-4">
    <div class="row justify-content-center">
        <div class="col-xl-11">

            <div class="row g-5 align-items-start">    
                <div class="col-lg-5 text-center">
                    <div class="p-3 rounded-3" style="background-color: #16161a; border: 1px solid #222225;">
                        <img src="{{ asset('img/' . $experience->gambar) }}" 
                             class="img-fluid rounded-2 w-100" 
                             alt="Gambar Kegiatan" 
                             style="max-height: 350px; object-fit: contain; background-color: #0c0c0e;">
                    </div>
                </div>
                
                <div class="col-lg-7">
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <h2 class="fw-bold text-white mb-sm-0 mb-2 fs-2" style="letter-spacing: -0.5px;">
                            {{ $experience->judul }}
                        </h2>
                        <span class="badge bg-dark text-maroon-neon border border-maroon-neon px-3 py-2 fw-normal small">
                            {{ $experience->waktu }}
                        </span>
                    </div>
                    
                    <hr style="border-color: #222225;" class="my-4">

                    <p class="lh-lg text-light-content fs-6 mb-5" style="text-align: justify;">
                        {{ $experience->deskripsi }}
                    </p>

                    <div class="mb-5 p-3 rounded-3" style="background-color: #16161a; border-left: 3px solid #800000;">
                        <h6 class="fw-bold text-white mb-2" style="font-size: 0.9rem; uppercase; letter-spacing: 0.5px;">
                            Kesan:
                        </h6>
                        <p class="mb-0 text-light-content small fst-italic lh-base">
                            "{{ $experience->kesan }}"
                        </p>
                    </div>

                    <div class="mt-5 pt-3 border-top" style="border-color: #222225 !important;">
                        <a href="{{ route('experience') }}" class="btn btn-outline-custom px-4 py-2">
                            &larr; Kembali
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<style>
    .text-light-content {
        color: #cccccc !important;
    }
</style>
@endsection