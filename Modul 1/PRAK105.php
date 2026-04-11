<!DOCTYPE html>

<html>
    <head>
        <title> PRAK 105 </title>

        <style>
            table, td, th {
                border: 1px solid black;
            }
            th, td {
                padding: 2px 5px;
            }
            th {
                padding: 20px;
                font-size: 24px;
                font-weight: bold;
                background: #ff0303;
            }
        </style>
    </head>
    <body>

        <?php 
        $SamsungPhone = [
            "S Series" => "Samsung Galaxy S22",
            "S plus Series" => "Samsung Galaxy S22+",
            "A Series" => "Samsung Galaxy A03",
            "Xcover Series" => "Samsung Galaxy Xcover 5"
        ];
        ?> 

        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php foreach ($SamsungPhone as $key => $phone) : ?>
                <tr>
                    <td><?php echo $phone; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>