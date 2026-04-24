<?php
$namaErr = $nimErr = $genderErr = "";
$nama = $nim = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty ($_POST["nama"])) { 
        $namaErr = "nama tidak boleh kosong"; 
        } else {
            $nama = $_POST["nama"]; 
        } 
    
    if (empty ($_POST["nim"])) { 
        $nimErr = "nim tidak boleh kosong"; 
        } else {
            $nim = $_POST["nim"]; 
        } 
    
    if (empty ($_POST["gender"])) { 
        $genderErr = "jenis kelamin tidak boleh kosong"; 
        } else {
            $gender = $_POST["gender"]; 
        } 
    }
?>

<!doctype html>
<html>
    <head>
        <title> soal 2</title>

        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    
    <body>
        <form action='' method='post'>
            Nama:  
            <input type='text' name='nama' value="<?= $nama ?>"> 
            <span class="error">* <?= $namaErr ?></span> <br>

            NIM:  
            <input type='text' name='nim' value="<?= $nim ?>"> 
            <span class="error">* <?= $nimErr ?></span> <br>
            
            Jenis Kelamin: <span class="error">* <?= $genderErr ?></span> <br>
            <input type='radio' name='gender' value='Laki-Laki' <?php if (isset($_POST['gender']) && $_POST['gender'] == "Laki-Laki") echo "checked"; ?>> Laki-Laki <br>
            <input type='radio' name='gender' value='Perempuan' <?php if (isset($_POST['gender']) && $_POST['gender'] == "Perempuan") echo "checked"; ?>> Perempuan <br>
            
            <input type='submit' value='submit'>
        </form>

        <?php
            if (!empty($nama) && !empty($nim) && !empty($gender)) {
                echo "<h2> Output: </h2>";
                echo $nama . "<br>";
                echo $nim . "<br>";
                echo $gender . "<br>";
            }
        ?>

    </body>
</html>