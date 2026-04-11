<!DOCTYPE html>

<html>
    <head>
        <title> PRAK 104 </title>

        <style>
            table, td, th {
                border: 1px solid black;
            }
            th, td {
                padding: 2px 5px;
            }
            th {
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <?php 
        $smartphone = [
            "Samsung Galaxy S22",
            "Samsung Galaxy S22+",
            "Samsung Galaxy A03",
            "Samsung Galaxy Xcover 5"
        ];
        ?> 

        <table>
            <tr>
                <th>Daftar Smartphone Samsung</th>
            </tr>
            <?php foreach ($smartphone as $phone) : ?>
                <tr>
                    <td><?php echo $phone; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>