<?php
include 'Koneksi.php';

$query = mysqli_query($conn, "
    SELECT peminjaman.*, member.nama_member, buku.judul_buku
    FROM peminjaman
    JOIN member ON peminjaman.id_member = member.id_member
    JOIN buku ON peminjaman.id_buku = buku.id_buku
");

if(isset($_GET['hapus'])){
    mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$_GET[hapus]'");
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman - Perpustakaan Arutala</title>
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
                <a href="Buku.php" class="nav-item">
                    <i class="fa-solid fa-book"></i> Data Buku
                </a>
                <a href="Peminjaman.php" class="nav-item active">
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
                    <h2>Data Peminjaman Buku</h2>
                    <p>Pantau transaksi peminjaman, tanggal jatuh tempo, dan riwayat sirkulasi buku</p>
                </div>
            </header>

            <section class="content-body">
                
                <div class="action-wrapper">
                    <a href="FormPeminjaman.php" class="btn-tambah">
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
                            <?php while($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><strong><?= $row['nama_member']; ?></strong></td>
                                <td><?= $row['judul_buku']; ?></td>
                                <td style="text-align: center;"><?= date('d/m/Y', strtotime($row['tgl_pinjam'])); ?></td>
                                <td style="text-align: center;"><?= date('d/m/Y', strtotime($row['tgl_kembali'])); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="FormPeminjaman.php?id=<?= $row['id_peminjaman']; ?>" class="btn-action btn-edit">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="?hapus=<?= $row['id_peminjaman']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus riwayat transaksi ini?')">
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