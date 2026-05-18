<DOCTYPE html>
    <html>
    <head>
        <title>Soal 2</title>
    <style>
        table, th, td{
            border:1px solid black;
            border-collapse: collapse;
            padding:10px;
            text-align:center;
        }
    </style>
    </head>
    <body>
        <?php
        $data = [
            [
                "nama" => "Andi",
                "nim" => "2101001",
                "uts"=> 87,
                "uas" => 65
            ],
            [
                "nama" => "Budi",
                "nim" => "2101002",
                "uts"=> 76,
                "uas" => 79
            ],
            [
                "nama" => "Tono",
                "nim" => "2101003",
                "uts"=> 50,
                "uas" => 41
            ],
            [
                "nama" => "Jessica",
                "nim" => "2101004",
                "uts"=> 60,
                "uas" => 75
            ]
        ];

        echo "<table>";
        echo "
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>
            ";

            foreach($data as $mhs){
                $akhir = (0.4 * $mhs['uts']) + (0.6 * $mhs['uas']);

                if($akhir >= 80){
                    $huruf = "A";
                }elseif($akhir >= 70){
                    $huruf = "B";
                }elseif($akhir >= 60){
                    $huruf = "C";
                }elseif($akhir >= 50){
                    $huruf = "D";
                }else{
                    $huruf = "E";
                }

                echo "<tr>";
                echo "<td>".$mhs['nama']."</td>";
                echo "<td>".$mhs['nim']."</td>";
                echo "<td>".$mhs['uts']."</td>";
                echo "<td>".$mhs['uas']."</td>";
                echo "<td>".$akhir."</td>";
                echo "<td>".$huruf."</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
            ?>
    </body>
</html>