<!doctype html>
<html>
    <head>
        <title> soal 3</title>
    </head>
    
    <body>
        <form action='' method='post'>
            Nilai:  
            <input type='text' name='nilai' value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : ''?>"> <br>

            Dari: <br>
            <input type='radio' name='suhu_awal' value='Celcius' <?php if (isset($_POST['suhu_awal']) && $_POST['suhu_awal'] == "Celcius") echo "checked"; ?>> Celcius <br>
            <input type='radio' name='suhu_awal' value='Fahrenheit' <?php if (isset($_POST['suhu_awal']) && $_POST['suhu_awal'] == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
            <input type='radio' name='suhu_awal' value='Rheamur' <?php if (isset($_POST['suhu_awal']) && $_POST['suhu_awal'] == "Rheamur") echo "checked"; ?>> Rheamur <br>
            <input type='radio' name='suhu_awal' value='Kelvin' <?php if (isset($_POST['suhu_awal']) && $_POST['suhu_awal'] == "Kelvin") echo "checked"; ?>> Kelvin <br>


            Ke: <br>
            <input type='radio' name='suhu_tujuan' value='Celcius' <?php if (isset($_POST['suhu_tujuan']) && $_POST['suhu_tujuan'] == "Celcius") echo "checked"; ?>> Celcius <br>
            <input type='radio' name='suhu_tujuan' value='Fahrenheit' <?php if (isset($_POST['suhu_tujuan']) && $_POST['suhu_tujuan'] == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
            <input type='radio' name='suhu_tujuan' value='Rheamur' <?php if (isset($_POST['suhu_tujuan']) && $_POST['suhu_tujuan'] == "Rheamur") echo "checked"; ?>> Rheamur <br>
            <input type='radio' name='suhu_tujuan' value='Kelvin' <?php if (isset($_POST['suhu_tujuan']) && $_POST['suhu_tujuan'] == "Kelvin") echo "checked"; ?>> Kelvin <br>

            <input type='submit' value='Konversi'>
        </form>
    </body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai=$_POST['nilai'];
    $asal=$_POST['suhu_awal'];
    $tujuan=$_POST['suhu_tujuan'];
    $hasil = 0;

    if ($asal == "Celcius") {
        $celcius = $nilai;
    } elseif ($asal = "Fahrenheit") {
        $celcius = ($nilai - 32) * 5/9;
    } elseif ($asal = "Rheamur") {
        $celcius = $nilai * 5/4;
    } elseif ($asal = "Kelvin") {
        $celcius = $nilai - 273.15;
    }

    if ($tujuan == "Celcius") {
        $hasil = $celcius;
    } elseif ($tujuan = "Fahrenheit") {
        $hasil = ($celcius * 9/5) + 32;
    } elseif ($tujuan = "Rheamur") {
        $hasil = $celcius * 4/5;
    } elseif ($tujuan = "Kelvin") {
        $hasil = $celcius + 273.15;
    }

    echo "<h2>Hasil Konversi: $hasil °" . substr($tujuan, 0, 1) . "</h2>";
}
?>