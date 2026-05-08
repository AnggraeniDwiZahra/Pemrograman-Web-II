<!doctype html>
<html>
    <head>
        <title> soal 2</title>
    </head>
    
    <body>
        <form action='' method='post'>
            Tinggi:
            <input type='number' name='tinggi' value="<?= isset($_POST['tinggi']) ? $_POST['tinggi'] : ''?>"> <br>
            Alamat Gambar:
            <input type='url' name='alamatgambar' value="<?= isset($_POST['alamatgambar']) ? $_POST['alamatgambar'] : ''?>"> <br>
            <input type='submit' value='Cetak'>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['tinggi']) && !empty($_POST['alamatgambar'])) {
                $tinggi = (int)$_POST['tinggi'];
                $url = $_POST['alamatgambar'];

                echo "<div style='margin-top: 30px; display: inline-block; text-align: right;'>";

                $i = $tinggi; 
                while ($i >= 1) {
                    echo "<div>";
                    
                    $j = 1;
                    while ($j <= $i) {
                        echo "<img src='$url' width='30' style='margin-left: 5px; margin-bottom: 5px;'>";
                        $j++;
                    }
                    
                    echo "</div>"; 
                    $i--; 
                }
                echo "</div>";
            }
        }
        ?>
    </body>
</html>