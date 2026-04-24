<?php
$hasil = "";

if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];

    if ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai >= 1 && $nilai <= 9) {
        $hasil = "Satuan";
    } elseif ($nilai >= 11 && $nilai <= 19) {
        $hasil = "Belasan";
    } elseif ($nilai == 10 || ($nilai >= 20 && $nilai <= 99)) {
        $hasil = "Puluhan";
    } elseif ($nilai >= 100 && $nilai <= 999) {
        $hasil = "Ratusan";
    } elseif ($nilai >= 1000) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    }
}
?>

<!doctype html>
<html>
    <head>
        <title> soal 4</title>
    </head>
    
    <body>
        <form action='' method='post'>
            Nilai:  
            <input type='text' name='nilai' value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : ''?>"> <br>

            <input type='submit' name='konversi' value='Konversi'>
        </form>

        <?php
            if ($hasil != ""): ?>
                <h2> Hasil: <?= $hasil ?></h2>
        <?php endif; ?>
    </body>
</html>