<!doctype html>
<html>
    <head>
        <title>Soal 5</title>
    </head>
    <body>
        <form action='' method='post'>
            <input type='text' name='kata' required>
            <input type='submit' name='submit' value='submit'>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $kata = $_POST['kata'];
            $panjang = strlen($kata);
            
            echo "<h3>Input:</h3>";
            echo "$kata";
            
            echo "<h3>Output:</h3>";
            
            $karakter = str_split($kata);

            foreach ($karakter as $huruf) {
                echo strtoupper($huruf); 

                for ($i = 1; $i < $panjang; $i++) {
                    echo strtolower($huruf);
                }
            }
        }
        ?>
    </body>
</html>