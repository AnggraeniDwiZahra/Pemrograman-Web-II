<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan Arutala</title>
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
                
                <a href="{{ route('dashboard') }}" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2>Data Buku</h2>
                    <p>Kelola katalog buku, judul, penulis, penerbit, hingga tahun terbit</p>
                </div>
            </header>

            <section class="content-body">
                
                <div class="action-wrapper">
                    <a href="{{ route('buku.create') }}" class="btn-tambah">
                        <i class="fa-solid fa-plus"></i> Tambah Buku
                    </a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 60px; text-align: center;">ID</th>
                                <th>Judul Buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th style="width: 100px; text-align: center;">Tahun</th>
                                <th style="text-align: center; width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($buku as $row)
                            <tr>
                                <td style="text-align: center;">{{ $row->id_buku }}</td>
                                <td><strong>{{ $row->judul_buku }}</strong></td>
                                <td>{{ $row->penulis }}</td>
                                <td>{{ $row->penerbit }}</td>
                                <td style="text-align: center;">
                                    <span class="badge-tahun" style="background: #eef2f5; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85rem; color: #2c3e50;">
                                        {{ $row->tahun_terbit }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('buku.edit', $row->id_buku) }}" class="btn-action btn-edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        
                                        <form action="{{ route('buku.destroy', $row->id_buku) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')" style="display:inline; background:none; padding:0; box-shadow:none; max-width:none;">
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
                                <td colspan="6" style="text-align: center; color: #7f8c8d;">Belum ada katalog buku yang terdaftar.</td>
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