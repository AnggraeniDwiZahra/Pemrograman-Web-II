<!doctype html>
<html>
    <head>
        <title>Soal 4</title>
    </head>
    <body>
        <?php
        $jumlah = 0;
        $sudah_submit = false; 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sudah_submit = true;

            if (isset($_POST['jumlah_sekarang'])) {
                $jumlah = (int)$_POST['jumlah_sekarang'];
            } elseif (isset($_POST['angka_input'])) {
                $jumlah = (int)$_POST['angka_input'];
            }

            if (isset($_POST['tambah'])) {
                $jumlah++;
            } elseif (isset($_POST['kurang'])) {
                $jumlah = max(0, $jumlah - 1);
            }
        }
        ?>

        <form action='' method='post'>
            <?php if (!$sudah_submit || $jumlah == 0 && !isset($_POST['tambah'])): ?>
                Jumlah bintang <input type='number' name='angka_input' value='<?php echo $jumlah; ?>' min='0'> <br>
                <input type='submit' name='submit_awal' value='Submit'>
            <?php endif; ?>
            
            <?php if ($sudah_submit && $jumlah > 0 || isset($_POST['tambah'])): ?>
                <p>Jumlah bintang <?php echo $jumlah; ?></p>
                
                <div style="margin-bottom: 10px;">
                    <?php
                    $url_bintang = "star-images.png";
                    for ($i = 0; $i < $jumlah; $i++) {
                        echo "<img src='$url_bintang' width='80' style='margin-right: 5px;'>";
                    }
                    ?>
                </div>

                <input type='hidden' name='jumlah_sekarang' value='<?php echo $jumlah; ?>'>
                <input type='submit' name='tambah' value='Tambah'>
                <input type='submit' name='kurang' value='Kurang'>
            <?php endif; 
            ?>
        </form>
    </body>
</html>