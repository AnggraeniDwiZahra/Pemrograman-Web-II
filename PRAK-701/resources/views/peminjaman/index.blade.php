<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Perpustakaan Arutala</title>
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
                
                <a href="{{ route('dashboard') }}" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2>Data Peminjaman Buku</h2>
                    <p>Pantau transaksi peminjaman, tanggal jatuh tempo, dan riwayat sirkulasi buku</p>
                </div>
            </header>

            <section class="content-body">
                
                @if ($errors->any())
                    <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; margin-bottom: 15px; font-weight: bold;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="action-wrapper">
                    <a href="{{ route('peminjaman.create') }}" class="btn-tambah">
                        <i class="fa-solid fa-plus"></i> Tambah Transaksi
                    </a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Member</th>
                                <th>Judul Buku</th>
                                <th style="width: 150px; text-align: center;">Tanggal Pinjam</th>
                                <th style="width: 150px; text-align: center;">Tanggal Kembali</th>
                                <th style="text-align: center; width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjaman as $row)
                            <tr>
                                <td><strong>{{ $row->nama_member }}</strong></td>
                                <td>{{ $row->judul_buku }}</td>
                                <td style="text-align: center;">{{ date('d/m/Y', strtotime($row->tgl_pinjam)) }}</td>
                                <td style="text-align: center;">{{ date('d/m/Y', strtotime($row->tgl_kembali)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('peminjaman.edit', $row->id_peminjaman) }}" class="btn-action btn-edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        
                                        <form action="{{ route('peminjaman.destroy', $row->id_peminjaman) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat transaksi ini?')" style="display:inline; background:none; padding:0; box-shadow:none; max-width:none;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" style="border:none; padding: 8px 12px; cursor:pointer;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #7f8c8d;">Belum ada riwayat transaksi peminjaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </section>
        </main>

    </div>

</body>
</html>