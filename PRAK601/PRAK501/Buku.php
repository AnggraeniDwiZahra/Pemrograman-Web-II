<?php
include 'Model.php';

$data = getData('buku');

if(isset($_GET['hapus'])){
    deleteBuku($_GET['hapus']);
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan Arutala</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="app-layout">
        
        <aside class="sidebar">
            <nav class="sidebar-menu">
                <a href="index.php" class="nav-item">
                    <i class="fa-solid fa-house"></i> Dashboard
                </a>
                <a href="Member.php" class="nav-item">
                    <i class="fa-solid fa-users"></i> Data Member
                </a>
                <a href="Buku.php" class="nav-item active">
                    <i class="fa-solid fa-book"></i> Data Buku
                </a>
                <a href="Peminjaman.php" class="nav-item">
                    <i class="fa-solid fa-hand-holding-hand"></i> Data Peminjaman
                </a>
                
                <a href="index.php" class="nav-item nav-back">
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
                    <a href="FormBuku.php" class="btn-tambah">
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
                            <?php while($row = mysqli_fetch_assoc($data)) { ?>
                            <tr>
                                <td style="text-align: center;"><?= $row['id_buku']; ?></td>
                                <td><strong><?= $row['judul_buku']; ?></strong></td>
                                <td><?= $row['penulis']; ?></td>
                                <td><?= $row['penerbit']; ?></td>
                                <td style="text-align: center;"><span class="badge-tahun" style="background: #eef2f5; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.85rem; color: #2c3e50;"><?= $row['tahun_terbit']; ?></span></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="FormBuku.php?id=<?= $row['id_buku']; ?>" class="btn-action btn-edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?hapus=<?= $row['id_buku']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </section>
        </main>

    </div>

</body>
</html>