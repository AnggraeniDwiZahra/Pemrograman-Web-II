<!DOCTYPE html>
<html>
<head>
    <title>Soal 3</title>
    <style>
        table, th, td{
            border:1px solid black;
            border-collapse: collapse;
            padding:10px;
        }

        .hijau{
            background-color: limegreen;
        }

        .merah{
            background-color: red;
        }
    </style>
</head>
<body>

<?php

$data = [
    [
        "no" => 1,
        "nama" => "Ridho",
        "matkul" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],

    [
        "no" => 2,
        "nama" => "Ratna",
        "matkul" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],

    [
        "no" => 3,
        "nama" => "Tono",
        "matkul" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

echo "<table>";

echo "
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Mata Kuliah diambil</th>
    <th>SKS</th>
    <th>Total SKS</th>
    <th>Keterangan</th>
</tr>
";

foreach($data as $mhs){

    $total = 0;

    foreach($mhs['matkul'] as $mk){
        $total += $mk['sks'];
    }

    if($total < 7){
        $ket = "Revisi KRS";
        $class = "merah";
    }else{
        $ket = "Tidak Revisi";
        $class = "hijau";
    }

    $jumlahMK = count($mhs['matkul']);

    for($i = 0; $i < $jumlahMK; $i++){

        echo "<tr>";

        if($i == 0){

            echo "<td rowspan='$jumlahMK'>".$mhs['no']."</td>";
            echo "<td rowspan='$jumlahMK'>".$mhs['nama']."</td>";
        }

        echo "<td>".$mhs['matkul'][$i]['nama_mk']."</td>";
        echo "<td>".$mhs['matkul'][$i]['sks']."</td>";

        if($i == 0){

            echo "<td rowspan='$jumlahMK'>$total</td>";
            echo "<td rowspan='$jumlahMK' class='$class'>$ket</td>";
        }

        echo "</tr>";
    }
}

echo "</table>";

?>
</body>
</html>