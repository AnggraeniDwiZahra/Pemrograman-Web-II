<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Arutala</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <section class="hero-banner">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <span class="welcome-badge">Selamat Datang</span>
            <h1>Perpustakaan Arutala</h1>
            <p><i class="fa-solid fa-quote-left"></i> Libraries are not made; they grow. <i class="fa-solid fa-quote-right"></i></p>
            <div class="date-badge-hero">
                <i class="fa-regular fa-calendar-days"></i>
                <span><?= date('d M Y'); ?></span>
            </div>
        </div>
    </section>

    <div class="dashboard-container">
        <h2 class="section-title">Menu</h2>
        <section class="menu-grid">
            
            <a href="Member.php" class="menu-card">
                <div class="card-thumb">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=400&q=80" alt="Member">
                </div>
                <div class="card-body-content">
                    <div class="menu-icon-wrapper circle-blue">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h3>Data Member</h3>
                    <p>Kelola data keanggotaan perpustakaan, tambah, edit, dan hapus member.</p>
                    <span class="menu-link-text">Buka Kelola <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </a>

            <a href="Buku.php" class="menu-card">
                <div class="card-thumb">
                    <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=400&q=80" alt="Buku">
                </div>
                <div class="card-body-content">
                    <div class="menu-icon-wrapper circle-green">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <h3>Data Buku</h3>
                    <p>Kelola katalog buku, judul, penulis, penerbit, hingga tahun terbit.</p>
                    <span class="menu-link-text">Buka Kelola <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </a>

            <a href="Peminjaman.php" class="menu-card">
                <div class="card-thumb">
                    <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=400&q=80" alt="Peminjaman">
                </div>
                <div class="card-body-content">
                    <div class="menu-icon-wrapper circle-orange">
                        <i class="fa-solid fa-hand-holding-hand"></i>
                    </div>
                    <h3>Data Peminjaman</h3>
                    <p>Catat transaksi peminjaman buku, tgl pinjam, serta verifikasi tgl kembali.</p>
                    <span class="menu-link-text">Buka Kelola <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </a>

        </section>
    </div> <footer class="main-footer">
        <p>&copy; 2026 Perpustakaan Arutala. All Rights Reserved.</p>
    </footer>

</body>
</html>