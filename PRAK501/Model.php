<?php
include 'Koneksi.php';

function getData($table){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM $table");
    return $query;
}

function insertMember($data){
    global $conn;
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $tgl_daftar = $data['tgl_mendaftar'];
    $tgl_bayar = $data['tgl_terakhir_bayar'];

    mysqli_query($conn, "INSERT INTO member VALUES(NULL, '$nama', '$nomor', '$alamat', '$tgl_daftar', '$tgl_bayar')");
}

function updateMember($data){
    global $conn;
    $id = $data['id_member'];
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $tgl_daftar = $data['tgl_mendaftar'];
    $tgl_bayar = $data['tgl_terakhir_bayar'];

    mysqli_query($conn, "UPDATE member SET
        nama_member='$nama',
        nomor_member='$nomor',
        alamat='$alamat',
        tgl_mendaftar='$tgl_daftar',
        tgl_terakhir_bayar='$tgl_bayar'
        WHERE id_member='$id'
    ");
}

function deleteMember($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM member WHERE id_member='$id'");
}

function insertBuku($data){
    global $conn;
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun_terbit'];

    mysqli_query($conn, "INSERT INTO buku VALUES(NULL, '$judul', '$penulis', '$penerbit', '$tahun')");
}

function updateBuku($data){
    global $conn;
    $id = $data['id_buku'];
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun_terbit'];

    mysqli_query($conn, "UPDATE buku SET
        judul_buku='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun_terbit='$tahun'
        WHERE id_buku='$id'
    ");
}

function deleteBuku($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");
}

function insertPeminjaman($data){
    global $conn;
    $member = $data['id_member'];
    $buku = $data['id_buku'];
    $pinjam = $data['tgl_pinjam'];
    $kembali = $data['tgl_kembali'];

    if($kembali < $pinjam){
        echo "<script>alert('Tanggal kembali tidak boleh kurang dari tanggal pinjam!');window.history.back();</script>";
        return;
    }

    mysqli_query($conn, "INSERT INTO peminjaman VALUES(NULL, '$member', '$buku', '$pinjam', '$kembali')");
}

function updatePeminjaman($data) {
    global $conn;
    $id = $data['id_peminjaman'];
    $id_member = $data['id_member'];
    $id_buku = $data['id_buku'];
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];

    $query = "UPDATE peminjaman SET 
              id_member = '$id_member', 
              id_buku = '$id_buku', 
              tgl_pinjam = '$tgl_pinjam', 
              tgl_kembali = '$tgl_kembali' 
              WHERE id_peminjaman = '$id'";
              
    return mysqli_query($conn, $query);
}

function deletePeminjaman($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman='$id'");
}
?>