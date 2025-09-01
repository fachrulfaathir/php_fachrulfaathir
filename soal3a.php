<?php
include "koneksi.php";

$sql = "
    SELECT h.hobi, COUNT(DISTINCT h.person_id) AS jumlah_person
    FROM hobi h
    GROUP BY h.hobi
    ORDER BY jumlah_person DESC
";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Hobi</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Jumlah Orang per Hobi</h2>
    <table>
        <tr>
            <th>Hobi</th>
            <th>Jumlah Person</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['hobi']; ?></td>
                <td><?= $row['jumlah_person']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
