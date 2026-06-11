<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member - Perpustakaan Arutala</title>
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
                <a href="{{ route('member.index') }}" class="nav-item active">
                    <i class="fa-solid fa-users"></i> Data Member
                </a>
                <a href="{{ url('/buku') }}" class="nav-item">
                    <i class="fa-solid fa-book"></i> Data Buku
                </a>
                <a href="{{ url('/peminjaman') }}" class="nav-item">
                    <i class="fa-solid fa-hand-holding-hand"></i> Data Peminjaman
                </a>
                
                <a href="{{ route('member.index') }}" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2>{{ isset($member) ? 'Edit Data Member' : 'Tambah Member Baru' }}</h2>
                    <p>Silakan isi formulir di bawah ini dengan data yang valid</p>
                </div>
            </header>

            <section class="content-body">
                
                <form action="{{ isset($member) ? route('member.update', $member->id_member) : route('member.store') }}" method="POST">
                    @csrf
                    @if(isset($member))
                        @method('PUT')
                    @endif

                    <input type="hidden" name="id_member" value="{{ isset($member) ? $member->id_member : '' }}">

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Nama Lengkap :</label>
                    <input type="text" name="nama_member" value="{{ isset($member) ? $member->nama_member : old('nama_member') }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Nomor Telepon :</label>
                    <input type="text" name="nomor_member" value="{{ isset($member) ? $member->nomor_member : old('nomor_member') }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Alamat :</label>
                    <textarea name="alamat" rows="4" required style="width: 100%; box-sizing: border-box;">{{ isset($member) ? $member->alamat : old('alamat') }}</textarea>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Daftar :</label>
                    <input type="datetime-local" name="tgl_mendaftar" 
                           value="{{ isset($member) ? date('Y-m-d\TH:i', strtotime($member->tgl_mendaftar)) : old('tgl_mendaftar') }}" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Bayar :</label>
                    <input type="date" name="tgl_terakhir_bayar" 
                           value="{{ isset($member) ? date('Y-m-d', strtotime($member->tgl_terakhir_bayar)) : old('tgl_terakhir_bayar') }}" required>

                    <div style="margin-top: 25px; display: flex; gap: 10px;">
                        <button type="submit">Simpan Data</button>
                        <a href="{{ route('member.index') }}" class="btn-action btn-delete" style="padding: 10px 20px; font-size: 14px; font-weight: bold; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">Batal</a>
                    </div>
                </form>

            </section>
        </main>

    </div>

</body>
</html>