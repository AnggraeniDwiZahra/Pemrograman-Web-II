<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku - Perpustakaan Arutala</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-layout">
        
        <aside class="sidebar">
            <nav class="sidebar-menu">
                <a href="{{ route('dashboard') }}" class="nav-item">
                    <i class="fa-solid fa-house"></i> Dashboard
                </a>
                <a href="{{ route('member.index') }}" class="nav-item">
                    <i class="fa-solid fa-users"></i> Data Member
                </a>
                <a href="{{ route('buku.index') }}" class="nav-item active">
                    <i class="fa-solid fa-book"></i> Data Buku
                </a>
                <a href="{{ url('/peminjaman') }}" class="nav-item">
                    <i class="fa-solid fa-hand-holding-hand"></i> Data Peminjaman
                </a>
                
                <a href="{{ route('buku.index') }}" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2>{{ isset($book) ? 'Edit Data Buku' : 'Tambah Buku Baru' }}</h2>
                    <p>Silakan isi informasi katalog buku secara lengkap di bawah ini</p>
                </div>
            </header>

            <section class="content-body">
                @if ($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 15px; font-weight: bold; list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li><i class="fa-solid fa-triangle-exclamation"></i> {{ $error }}</li>
                    @endforeach
                </div>
                @endif
                <form action="{{ isset($book) ? route('buku.update', $book->id_buku) : route('buku.store') }}" method="POST">
                    @csrf
                    @if(isset($book))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="id_buku" value="{{ isset($book) ? $book->id_buku : '' }}">

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Judul Buku :</label>
                    <input type="text" name="judul_buku" value="{{ isset($book) ? $book->judul_buku : old('judul_buku') }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Penulis :</label>
                    <input type="text" name="penulis" value="{{ isset($book) ? $book->penulis : old('penulis') }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Penerbit :</label>
                    <input type="text" name="penerbit" value="{{ isset($book) ? $book->penerbit : old('penerbit') }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tahun Terbit :</label>
                    <select name="tahun_terbit" required>
                        <option value="">-- Pilih Tahun --</option>
                        @for ($i = 2026; $i >= 1900; $i--)
                            <option value="{{ $i }}" 
                                {{ (isset($book) && $book->tahun_terbit == $i) || old('tahun_terbit') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>

                    <div style="margin-top: 25px; display: flex; gap: 10px;">
                        <button type="submit">Simpan Buku</button>
                        <a href="{{ route('buku.index') }}" class="btn-action btn-delete" style="padding: 10px 20px; font-size: 14px; font-weight: bold; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">Batal</a>
                    </div>
                </form>

            </section>
        </main>

    </div>

</body>
</html>