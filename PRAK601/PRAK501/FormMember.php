<?php
include 'Model.php';
include 'Koneksi.php';

$id = ""; $nama = ""; $nomor = ""; $alamat = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM member WHERE id_member='$id'");
    $data = mysqli_fetch_assoc($query);
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
}

if(isset($_POST['simpan'])){
    if($_POST['id_member'] == ""){
        insertMember($_POST);
    } else {
        updateMember($_POST);
    }
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member - Perpustakaan Arutala</title>
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
                
                <a href="Member.php" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2><?= isset($_GET['id']) ? 'Edit Data Member' : 'Tambah Member Baru' ?></h2>
                    <p>Silakan isi formulir di bawah ini dengan data yang valid</p>
                </div>
            </header>

            <section class="content-body">
                
                <form method="POST">
                    <input type="hidden" name="id_member" value="<?= $id ?>">

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Nama Lengkap :</label>
                    <input type="text" name="nama_member" value="<?= $nama ?>" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Nomor Telepon :</label>
                    <input type="text" name="nomor_member" value="<?= $nomor ?>" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Alamat :</label>
                    <textarea name="alamat" rows="4" required><?= $alamat ?></textarea>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Daftar :</label>
                    <input type="datetime-local" name="tgl_mendaftar" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Bayar :</label>
                    <input type="date" name="tgl_terakhir_bayar" required>

                    <div style="margin-top: 25px; display: flex; gap: 10px;">
                        <button type="submit" name="simpan">Simpan Data</button>
                        <a href="Member.php" class="btn-action btn-delete" style="padding: 10px 20px; font-size: 14px; font-weight: bold;">Batal</a>
                    </div>
                </form>

            </section>
        </main>

    </div>

</body>
</html>