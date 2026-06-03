<?php
include 'Model.php';
include 'Koneksi.php';

$id = "";
$id_member_lama = "";
$id_buku_lama = "";
$tgl_pinjam = "";
$tgl_kembali = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_peminjaman = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
    $data_peminjaman = mysqli_fetch_assoc($query_peminjaman);
    
    $id_member_lama = $data_peminjaman['id_member'];
    $id_buku_lama = $data_peminjaman['id_buku'];
    $tgl_pinjam = $data_peminjaman['tgl_pinjam'];
    $tgl_kembali = $data_peminjaman['tgl_kembali'];
}

if(isset($_POST['simpan'])){
    $tgl_pinjam_input = $_POST['tgl_pinjam'];
    $tgl_kembali_input = $_POST['tgl_kembali'];

    $pinjam = new DateTime($tgl_pinjam_input);
    $kembali = new DateTime($tgl_kembali_input);

    if ($kembali < $pinjam) {
        echo "<script>alert('Error: Tanggal kembali tidak boleh sebelum tanggal pinjam!'); window.history.back();</script>";
        exit;
    }

    if($_POST['id_peminjaman'] == ""){
        insertPeminjaman($_POST);
    } else {
        mysqli_query($conn, "UPDATE peminjaman SET 
            id_member = '$_POST[id_member]', 
            id_buku = '$_POST[id_buku]', 
            tgl_pinjam = '$_POST[tgl_pinjam]', 
            tgl_kembali = '$_POST[tgl_kembali]' 
            WHERE id_peminjaman = '$_POST[id_peminjaman]'");
    }
    
    header("Location: Peminjaman.php");
    exit;
}

$member = mysqli_query($conn, "SELECT * FROM member");
$buku = mysqli_query($conn, "SELECT * FROM buku");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman - Perpustakaan Arutala</title>
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
                
                <a href="Peminjaman.php" class="nav-item nav-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
            </nav>
        </aside>

        <main class="main-content">
            
            <header class="topbar">
                <div class="page-info">
                    <h2><?= isset($_GET['id']) ? 'Edit Transaksi Peminjaman' : 'Input Transaksi Peminjaman' ?></h2>
                    <p>Silakan isi detail data peminjaman buku perpustakaan di bawah ini</p>
                </div>
            </header>

            <section class="content-body">
                
                <form method="POST">
                    <input type="hidden" name="id_peminjaman" value="<?= $id ?>">
                    
                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Nama Member :</label>
                    <select name="id_member" required>
                        <option value="">-- Pilih Member --</option>
                        <?php while($m = mysqli_fetch_assoc($member)) { 
                            $selected = ($m['id_member'] == $id_member_lama) ? "selected" : "";
                        ?>
                        <option value="<?= $m['id_member']; ?>" <?= $selected ?>><?= $m['nama_member']; ?></option>
                        <?php } ?>
                    </select>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Judul Buku :</label>
                    <select name="id_buku" required>
                        <option value="">-- Pilih Buku --</option>
                        <?php while($b = mysqli_fetch_assoc($buku)) { 
                            $selected = ($b['id_buku'] == $id_buku_lama) ? "selected" : "";
                        ?>
                        <option value="<?= $b['id_buku']; ?>" <?= $selected ?>><?= $b['judul_buku']; ?></option>
                        <?php } ?>
                    </select>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Pinjam :</label>
                    <input type="date" name="tgl_pinjam" value="<?= $tgl_pinjam ?>" required>

                    <label style="font-weight: bold; color: #2c3e50; display: block; margin-bottom: 5px;">Tanggal Kembali :</label>
                    <input type="date" name="tgl_kembali" value="<?= $tgl_kembali ?>" required>

                    <div style="margin-top: 25px; display: flex; gap: 10px;">
                        <button type="submit" name="simpan">Simpan Transaksi</button>
                        <a href="Peminjaman.php" class="btn-action btn-delete" style="padding: 10px 20px; font-size: 14px; font-weight: bold;">Batal</a>
                    </div>
                </form>

            </section>
        </main>

    </div>

</body>
</html>