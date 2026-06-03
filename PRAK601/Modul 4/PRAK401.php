<!DOCTYPE html>
<html>
    <head>
        <title>Soal 1</title>
        <style>
            table, td{
                border:1px solid black;
                border-collapse:collapse;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            Panjang: 
            <input type="number" name="panjang" required> <br>

            Lebar:
            <input type="number" name="lebar" required> <br>

            Nilai:
            <input type="text" name="nilai" required> <br>

            <input type="submit" name="cetak" value="Cetak">
        </form>
        <br>

        <?php
        if(isset($_POST['cetak'])) {
            $panjang = $_POST['panjang'];
            $lebar = $_POST['lebar'];

            $nilai = explode(" ", $_POST['nilai']);

            if(count($nilai) == ($panjang * $lebar)){
                echo "<table>";
                $index = 0;

                for($i = 0; $i < $panjang; $i++){
                    echo "<tr>";
                    
                    for($j = 0; $j < $lebar; $j++){
                        echo "<td>".$nilai[$index]."</td>";
                        $index++;
                    }
                echo "</tr>";
                }
                echo "</table>";
                
            }else{
                echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            }
        }
        ?>

    </body>
</html>