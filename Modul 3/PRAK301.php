<!doctype html>
<html>
    <head>
        <title> soal 1</title>
    </head>
    
    <body>
        <form action='' method='post'>
            Jumlah Peserta:
            <input type='number' name='jumlahpeserta' value="<?= isset($_POST['jumlahpeserta']) ? $_POST['jumlahpeserta'] : ''?>"> <br>
            <input type='submit' value='Cetak'>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(!empty($_POST['jumlahpeserta'])) {
                $n=(int)$_POST['jumlahpeserta'];

                echo "<div style='margin-top: 40px;'>";
            
                $i = 1;
                while ($i <= $n) {
                    if ($i % 2 != 0) { 
                        $warna = "red";
                    } else { 
                        $warna = "green";
                    } 
                    echo "<div style='color: $warna; font-size: 24px; font-weight:bold; margin-bottom: 12px;'>Peserta ke-$i</div>";

                    $i++;
                }
            }
        }
        ?>
    </body>
</html>