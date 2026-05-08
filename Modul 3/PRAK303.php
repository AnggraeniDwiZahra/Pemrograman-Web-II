<!doctype html>
<html>
    <head>
        <title>Soal 3</title>
    </head>
    <body>
        <form action='' method='post'>
            Batas Bawah: <input type='number' name='bawah' value="<?= isset($_POST['bawah']) ? $_POST['bawah'] : ''?>" required> <br>
            Batas Atas: <input type='number' name='atas' required value="<?= isset($_POST['atas']) ? $_POST['atas'] : ''?>" required> <br>
            <input type='submit' value='Cetak'>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bawah = (int)$_POST['bawah'];
            $atas = (int)$_POST['atas'];
            $url_bintang = "star-images.png";

            echo "<div style='margin-top: 20px;'>";
            echo "<h4>Hasil Deret:</h4>";

            $i = $bawah;

            if ($bawah <= $atas) {
                do {
                    if (($i + 7) % 5 == 0) {
                        echo "<img src='$url_bintang' width='20'; vertical-align: middle;'>";
                    } else {
                        echo "<span style='font-size: 20px; margin: 5px;'>$i</span>";
                    }

                    $i++;
                } while ($i <= $atas);
            } 
            echo "</div>";
        }
        ?>
    </body>
</html>
