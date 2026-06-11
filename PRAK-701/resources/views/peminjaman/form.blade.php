<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman - Perpustakaan Arutala</title>
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
                <a href="{{ route('buku.index') }}" class="nav-item">
                    <i class="fa-solid fa-book"></i> Data Buku
                </a>
                <a href="{{ route('peminjaman.index') }}" class="nav-item active">
                    <i class="fa-solid fa-hand-holding-hand"></i> Data Peminjaman
                </a>
                
                <a href="{{ route('peminjaman.index') }}" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2>{{ isset($transaksi) ? 'Edit Transaksi Peminjaman' : 'Input Transaksi Peminjaman' }}</h2>
                    <p>Silakan isi detail data peminjaman buku perpustakaan di bawah ini</p>
                </div>
            </header>

            <section class="content-body">
                
                <form action="{{ isset($transaksi) ? route('peminjaman.update', $transaksi->id_peminjaman) : route('peminjaman.store') }}" method="POST">
                    @csrf
                    @if(isset($transaksi))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="id_peminjaman" value="{{ isset($transaksi) ? $transaksi->id_peminjaman : '' }}">
                    
                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Nama Member :</label>
                    <select name="id_member" required>
                        <option value="">-- Pilih Member --</option>
                        @foreach($members as $m)
                            <option value="{{ $m->id_member }}" 
                                {{ (isset($transaksi) && $transaksi->id_member == $m->id_member) || old('id_member') == $m->id_member ? 'selected' : '' }}>
                                {{ $m->nama_member }}
                            </option>
                        @endforeach
                    </select>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Judul Buku :</label>
                    <select name="id_buku" required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach($buku as $b)
                            <option value="{{ $b->id_buku }}" 
                                {{ (isset($transaksi) && $transaksi->id_buku == $b->id_buku) || old('id_buku') == $b->id_buku ? 'selected' : '' }}>
                                {{ $b->judul_buku }}
                            </option>
                        @endforeach
                    </select>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Pinjam :</label>
                    <input type="date" name="tgl_pinjam" value="{{ isset($transaksi) ? date('Y-m-d', strtotime($transaksi->tgl_pinjam)) : old('tgl_pinjam', date('Y-m-d')) }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Kembali :</label>
                    <input type="date" name="tgl_kembali" value="{{ isset($transaksi) ? date('Y-m-d', strtotime($transaksi->tgl_kembali)) : old('tgl_kembali') }}" required>

                    <div style="margin-top: 25px; display: flex; gap: 10px;">
                        <button type="submit">Simpan Transaksi</button>
                        <a href="{{ route('peminjaman.index') }}" class="btn-action btn-delete" style="padding: 10px 20px; font-size: 14px; font-weight: bold; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">Batal</a>
                    </div>
                </form>

            </section>
        </main>

    </div>

</body>
</html>