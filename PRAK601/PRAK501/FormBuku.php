<?php
include 'Model.php';
include 'Koneksi.php';

$id = "";
$judul = "";
$penulis = "";
$penerbit = "";
$tahun = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
    $data = mysqli_fetch_assoc($query);
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun_terbit'];
}

if(isset($_POST['simpan'])){
    if($_POST['id_buku'] == ""){
        insertBuku($_POST);
    } else {
        updateBuku($_POST);
    }
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku - Perpustakaan Arutala</title>
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
                
                <a href="Buku.php" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2><?= isset($_GET['id']) ? 'Edit Data Buku' : 'Tambah Buku Baru' ?></h2>
                    <p>Silakan isi informasi katalog buku secara lengkap di bawah ini</p>
                </div>
            </header>

            <section class="content-body">
                
                <form method="POST">
                    <input type="hidden" name="id_buku" value="<?= $id ?>">

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Judul Buku :</label>
                    <input type="text" name="judul_buku" value="<?= $judul ?>" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Penulis :</label>
                    <input type="text" name="penulis" value="<?= $penulis ?>" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Penerbit :</label>
                    <input type="text" name="penerbit" value="<?= $penerbit ?>" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tahun Terbit :</label>
                    <select name="tahun_terbit" required>
                        <option value="">-- Pilih Tahun --</option>
                        <?php 
                        for ($i = 2026; $i >= 1900; $i--) { 
                            $selected = ($id != "" && $tahun == $i) ? "selected" : "";
                            echo "<option value='$i' $selected>$i</option>";
                        }
                        ?>
                    </select>

                    <div style="margin-top: 25px; display: flex; gap: 10px;">
                        <button type="submit" name="simpan">Simpan Buku</button>
                        <a href="Buku.php" class="btn-action btn-delete" style="padding: 10px 20px; font-size: 14px; font-weight: bold;">Batal</a>
                    </div>
                </form>

            </section>
        </main>

    </div>

</body>
</html>