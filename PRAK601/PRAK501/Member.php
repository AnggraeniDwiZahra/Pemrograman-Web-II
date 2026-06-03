<?php
include 'Model.php';

$data = getData('member');

if(isset($_GET['hapus'])){
    deleteMember($_GET['hapus']);
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member - Perpustakaan Arutala</title>
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
                <a href="Member.php" class="nav-item active">
                    <i class="fa-solid fa-users"></i> Data Member
                </a>
                <a href="Buku.php" class="nav-item">
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
                    <h2>Data Member</h2>
                    <p>Kelola data keanggotaan, kontak, alamat, serta status pembayaran iuran member</p>
                </div>
            </header>

            <section class="content-body">
                
                <div class="action-wrapper">
                    <a href="FormMember.php" class="btn-tambah">
                        <i class="fa-solid fa-user-plus"></i> Tambah Member
                    </a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px; text-align: center;">ID</th>
                                <th>Nama Member</th>
                                <th>No. Telepon</th>
                                <th>Alamat</th>
                                <th>Tgl Daftar</th>
                                <th>Terakhir Bayar</th>
                                <th style="text-align: center; width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($data)) { ?>
                            <tr>
                                <td style="text-align: center;"><?= $row['id_member']; ?></td>
                                <td><strong><?= $row['nama_member']; ?></strong></td>
                                <td><?= $row['nomor_member']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($row['tgl_mendaftar'])); ?></td>
                                <td><?= date('d/m/Y', strtotime($row['tgl_terakhir_bayar'])); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="FormMember.php?id=<?= $row['id_member']; ?>" class="btn-action btn-edit">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                        <a href="?hapus=<?= $row['id_member']; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus member ini?')">
                                            <i class="fa-solid fa-user-xmark"></i>
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